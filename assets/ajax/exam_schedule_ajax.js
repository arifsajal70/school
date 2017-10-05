/*************** TABLE ELEMENTS START *****************/

//view table after section is selected
function view_table(secid,section)
{   
    $("#section_label").html(section);
    $(".schedule_table").slideUp();
    $(".schedule_table").slideDown();
    $(".exam_attendance_table").hide();
    $.fn.dataTableExt.sErrMode = 'throw';
    window.exam_schedule = $('#schedule_table').dataTable({
        ajax: "exam_schedule/schedule_table/"+clsid+"/"+secid,
        language: {
            "lengthMenu": "_MENU_ Records Per Page",
            "zeroRecords": "No Exam Schedule Found",
            "info": "Showing page _PAGE_ of _PAGES_",
            "infoEmpty": "No records available",
            "infoFiltered": " -- Filtered from _MAX_ total records"
        },
        destroy: true,
        dom: 'Bfrtip',
        buttons: [
        {
            extend: 'pdfHtml5',
            exportOptions: {
                columns: [ 0, 1, 2 , 3 , 4 , 5 , 6 ]
            }
        },
        {
            extend: 'excelHtml5',
            exportOptions: {
                columns: [ 0, 1, 2 , 3 , 4 , 5 , 6 ]
            }
        },
        {
            extend: 'print',
            exportOptions: {
                columns: [ 0, 1, 2 , 3 , 4 , 5 , 6 ]
            }
        },
        ],
    });
}
//view table end

//sliding up and down for attendance and schedule table
function change_table()
{
    $(".schedule_table").slideDown();
    $(".exam_attendance_table").slideUp();
}

//view exam attendance table
function exam_attendance_table(id)
{
    $("body").append('<div class="preloader"></div>');
    $(".exam_attendance_table").slideDown();
    $(".schedule_table").slideUp();
    $.ajax({
        type: "POST",
        url: './exam_schedule/get_exam_details/'+id,
        success:function(data)
        {
            var details = JSON.parse(data);

            $("#examname").html(details['exam']);
            $("#examclass").html(details['class']);
            $("#examsection").html(details['section']);
            $("#examsubject").html(details['subject']);
            $("#examdate").html(details['date']);
            $("#examtime").html(details['examfrom']+" - "+details['examto']);
        },
        complete:function()
        {
            $(".preloader").fadeOut(function(){
                $("div").remove('.preloader');
            });
        }
    });
    
    $.fn.dataTableExt.sErrMode = 'throw';
    window.exam_attendance = $('#exam_attendance').dataTable({
        ajax: "exam_schedule/get_attendance/"+id,
        language: {
            "lengthMenu": "_MENU_ Records Per Page",
            "zeroRecords": "No Exam Attendance Register Found",
            "info": "Showing page _PAGE_ of _PAGES_",
            "infoEmpty": "No records available",
            "infoFiltered": " -- Filtered from _MAX_ total records"
        },
        destroy: true,
        dom: 'Bfrtip',
        buttons: [
        {
            extend: 'pdfHtml5',
            exportOptions: {
                columns: [ 0, 1, 2 , 3 , 4 ]
            }
        },
        {
            extend: 'excelHtml5',
            exportOptions: {
                columns: [ 0, 1, 2 , 3 , 4 ]
            }
        },
        {
            extend: 'print',
            exportOptions: {
                columns: [ 0, 1, 2 , 3 , 4 ]
            }
        },
        ],
    });
}


/*************** TABLE ELEMENTS END ******************/


/*************** FORM SUBMISSION ELEMENTS START ******************/

//getting section and subject when class selected in add exam schedule form
$('select[for="get_section"]').on('change',function(){
    $("#add_exam_schedule,#edit_exam_schedule").append('<div class="preloader"></div>');
    var classesID = $(this).find("option:selected").val();
    $.ajax ({
        type: "GET",
        url : './section/get_section_by_id/'+classesID+'/option',
        success:function(data)
        {
            $("select[name='sectionID']").html(data);
        }
    });

    $.ajax ({
        type: "GET",
        url : './subject/get_subject_by_id/'+classesID,
        success:function(data)
        {
            $("select[name='subjectID']").html(data);
        },
        complete:function()
        {
            $(".preloader").fadeOut(function(){
                $("div").remove('.preloader');
            });
        }
    });
});
//getting section and subject end

//add exam schedule form submission
$('#add_exam_schedule').submit(function(e){
    e.preventDefault();
    $("#add_exam_schedule").append('<div class="preloader"></div>');
    $.ajax({
        type: "POST",
        url: './exam_schedule/add',
        data: $(this).serialize(),
        success:function(data)
        {
            if(data === "Added")
            {
                setTimeout(function(){
                    exam_schedule.fnReloadAjax();
                });
                $("button[data-dismiss='modal']").click();
                toastr["success"]("Student Added Successfully");
                $("#add_exam_schedule input").val('');
                $('select[data-plugin="select2"]').val('').trigger('change.select2');
            }
            else if(data === "Notadded")
            {
                $("button[data-dismiss='modal']").click();
                toastr["error"]("Student Not Added, Please Try Again");
                $("#add_exam_schedule input,textarea").val('');
                $('select[data-plugin="select2"]').val('').trigger('change.select2');
            }
            else
            {
                toastr["warning"](data);
            }
        },
        complete:function()
        {
            $(".preloader").fadeOut(function(){
                $("div").remove('.preloader');
            });
        }
    });
});
//add exam schedule form submission end

//getting single exam schedule for fill up the editing form
function edit_exam_schedule(id)
{
    $("#editing_modal").trigger('click');
    $("#edit_exam_schedule").append('<div class="preloader"></div>');
    $.ajax({
        type: "GET",
        url: './exam_schedule/single/'+id,
        success:function(data)
        {
            var schedule = JSON.parse(data);
            
            $("select[for='examID']").val(schedule['examID']).trigger('change.select2');
            $("#classesID").val(schedule['classesID']).trigger('change.select2');
            $("select[for='subjectID']").val(schedule['subjectID']).trigger('change.select2');
            $("input[for='edate']").val(schedule['edate']);
            $("input[for='examfrom']").val(schedule['examfrom']);
            $("input[for='examto']").val(schedule['examto']);
            $("input[for='room']").val(schedule['room']);
            $.ajax({
                type: "GET",
                url: './section/get_section_by_id/'+schedule['classesID']+'/option',
                success:function(data)
                {
                    $('select[for="sectionID"]').html(data);
                    $('select[for="sectionID"]').val(schedule['sectionID']).trigger('change.select2');
                }
            });
            $.ajax({
                type: "GET",
                url: './subject/get_subject_by_id/'+schedule['classesID'],
                success:function(data)
                {
                    $('select[for="subjectID"]').html(data);
                    $('select[for="subjectID"]').val(schedule['subjectID']).trigger('change.select2');
                }
            });
            window.EditID = schedule['examscheduleID'];
        },
        complete:function()
        {
            $(".preloader").fadeOut(function(){
                $("div").remove('.preloader');
            });
        }
    });
}
//getting single exam schedule for fill up the editing form end

//edit exam schedule form submission
$("#edit_exam_schedule").submit(function(e){
    e.preventDefault();
    $("#edit_exam_schedule").append('<div class="preloader"></div>');
    $.ajax({
        type: "POST",
        url: './exam_schedule/edit/'+EditID,
        data: $(this).serialize(),
        success:function(data)
        {
            if(data === "Updated")
            {
                setTimeout(function(){
                    exam_schedule.fnReloadAjax();
                });
                $("button[data-dismiss='modal']").click();
                toastr["success"]("Exam Schedule Edited Successfully");
                $("#edit_student input").val('');
                $('select[data-plugin="select2"]').val('').trigger('change.select2');
            }
            else if(data === "Notupdated")
            {
                $("button[data-dismiss='modal']").click();
                toastr["error"]("Exam Schedule Not Edited, Please Try Again");
                $("#edit_student input").val('');
                $('select[data-plugin="select2"]').val('').trigger('change.select2');
            }
            else
            {
                toastr["warning"](data);
            }
        },
        complete:function()
        {
            $(".preloader").fadeOut(function(){
                $("div").remove('.preloader');
            });
        }
    });
});
//edit exam schedule form submission end


/*************** FORM SUBMISSION ELEMENTS END *******************/


/*************** OTHER ELEMENTS START *******************/

//change attendance
function change_attendance(attendanceID)
{
    $("body").append('<div class="preloader"></div>');
    $.ajax({
        type: "POST",
        url: './exam_schedule/change_attendance/'+attendanceID,
        success:function(data)
        {
            if(data === "Updated")
            {
                setTimeout(function(){
                    exam_attendance.fnReloadAjax();
                });
                toastr["success"]("Attendance Status Changed");
            }
            else if(data === "Notupdated")
            {
                toastr["error"]("Attendance Status Not Changed, Please Try Again");
            }
            else
            {
                toastr["warning"](data);
            }
        },
        complete:function()
        {
            $(".preloader").fadeOut(function(){
                $("div").remove('.preloader');
            });
        }
    });
}
//change attendance end

//delete exam_schedule
function delete_exam_schedule(id)
{
    swal({
        title: 'Are you sure?',
        text: "You won't be able undo this Action",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'delete',
        cancelButtonText: 'cancel',
        confirmButtonClass: 'btn btn-primary btn-lg mr-1',
        cancelButtonClass: 'btn btn-danger btn-lg',
        buttonsStyling: true
    }).then(function(isConfirm) {
        if (isConfirm === true) {

            $.ajax({
                type: "POST",
                url: './exam_schedule/delete/'+id,
                success:function(data)
                {
                    if(data === 'Deleted')
                    {
                        setTimeout(function(){
                            exam_schedule.fnReloadAjax();
                        });
                        swal({
                            title: 'Deleted!',
                            text: 'Deleted Successfully.',
                            type: 'success',
                            confirmButtonClass: 'btn btn-primary btn-lg',
                            buttonsStyling: false
                        });
                    }
                    else if(data === "Notdeleted")
                    {
                        swal({
                            title: 'Not Deleted!',
                            text: 'Not Deleted, Please Try Again',
                            type: 'error',
                            confirmButtonClass: 'btn btn-primary btn-lg',
                            buttonsStyling: false
                        });
                    }
                }
            });

        } 
        else if (isConfirm === false) {
            swal({
                title: 'Cancelled',
                text: 'You Calcelled Delete Action',
                type: 'error',
                confirmButtonClass: 'btn btn-primary btn-lg',
                buttonsStyling: false
            });
        }
    })
}
//delete exam schedule

function reload_table()
{
    if($('.schedule_table').is(":visible"))
    {
        setTimeout(function(){
            exam_schedule.fnReloadAjax();
        });
    }
    else if($('.exam_attendance_table').is(":visible"))
    {
        setTimeout(function(){
            exam_attendance.fnReloadAjax();
        });
    }
    else
    {
        swal({
            title: 'No Table Visible',
            text: 'Select Class And Section First',
            type: 'error',
            confirmButtonClass: 'btn btn-primary btn-lg',
            buttonsStyling: false
        });
    }
}


/*************** OTHER ELEMENTS END ********************/


//End of file exam_schedule_ajax.js
//location: ./asstes/ajax/exam_schedule_ajax.js