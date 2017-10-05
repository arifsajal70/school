/*************** TABLE ELEMENTS START *****************/

//getting section for top select section
function get_section(classesid,classes)
{   
    window.classesID = classesid ;
    $("#class_label").html(classes);
    $("body").append('<div class="preloader"></div>');
    $("#student").hide();
    $.ajax({
        type: "GET",
        url: './student/get_section_by_id/'+classesid+'/link',
        success:function(data)
        {
            $("#section_select").html(data);
        },
        complete:function()
        {
            $(".preloader").fadeOut(function(){
                $("div").remove('.preloader');
            });
        }
    });
}
//get section end

//view routine table
function view_table(sectionID,section)
{   
    window.sectionID = sectionID;
    window.section = section;
    $("#section_label").html(section);
    $("#routine").show();
    $.fn.dataTableExt.sErrMode = 'throw';
    var routine = $('#routine_table').dataTable({
        ajax: "routine/routine_table/"+classesID+"/"+sectionID,
        language: {
            "lengthMenu": "_MENU_ Records Per Page",
            "zeroRecords": "No Routine Found",
            "info": "Showing page _PAGE_ of _PAGES_",
            "infoEmpty": "No records available",
            "infoFiltered": " -- Filtered from _MAX_ total records"
        },
        destroy: true,
        dom: 'Bfrtip',
        buttons: [
        'copyHtml5',
        'excelHtml5',
        'csvHtml5',
        'pdfHtml5',
        'print'
        ],
        columnDefs: [
        {
            "targets": [ 0 ],
            "visible": false,
        }
        ],
        drawCallback: function (settings) {
            var api = this.api();
            var rows = api.rows({ page: 'current' }).nodes();
            var last = null;

            api.column(0, { page: 'current' }).data().each(function (group, i) {

                if (last !== group) {

                    $(rows).eq(i).before(
                        '<tr><td colspan="8" style="background-color:rgba(0, 153, 255, 0.1); text-align:center;">' +group+ '</td></tr><br>'
                        );

                    last = group;
                }
            });
        }
    });
}
//view routine table end

/*************** TABLE ELEMENTS END ******************/


/*************** FORM SUBMISSION ELEMENTS START ******************/


$('select[for="get_section"]').on('change',function(){
    $("#add_routine,#edit_routine").append('<div class="preloader"></div>');
    var classesID = $(this).find("option:selected").val();
    $.ajax ({
        type: "GET",
        url : './exam_schedule/get_section_by_id/'+classesID+'/option',
        success:function(data)
        {
            $("select[name='sectionID']").html(data);
        }
    });

    $.ajax ({
        type: "GET",
        url : './exam_schedule/get_subject_by_id/'+classesID,
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

//add routine
$('#add_routine').submit(function(e){
    e.preventDefault();
    $("#add_routine").append('<div class="preloader"></div>');
    $.ajax({
        type: "POST",
        url: './routine/add',
        data: $(this).serialize(),
        success:function(data)
        {
            if(data === "Added")
            {
                $("button[data-dismiss='modal']").click();
                toastr["success"]("Routine Added Successfully");
                $("#add_routine input,select").val('');
                $('select[data-plugin="select2"]').val('').trigger('change.select2');
                view_table(sectionID,section);
            }
            else if(data === "Notadded")
            {
                $("button[data-dismiss='modal']").click();
                toastr["error"]("Routine Not Added, Please Try Again");
                $("#add_routine input,textarea").val('');
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

function edit_routine(id)
{
    $("#editing_modal").trigger('click');
    $("#edit_routine").append('<div class="preloader"></div>');
    $.ajax({
        type: "GET",
        url: './routine/single/'+id,
        success:function(data)
        {
            var schedule = JSON.parse(data);
            
            $("#classesID").val(schedule['classesID']).trigger('change.select2');
            $("select[for='subjectID']").val(schedule['subjectID']).trigger('change.select2');
            $("input[for='start_time']").val(schedule['start_time']);
            $("input[for='end_time']").val(schedule['end_time']);
            $("input[for='room']").val(schedule['room']);
            $("select[for='day']").val(schedule['day']);
            $.ajax({
                type: "GET",
                url: './exam_schedule/get_section_by_id/'+schedule['classesID']+'/option',
                success:function(data)
                {
                    $('select[for="sectionID"]').html(data);
                    $('select[for="sectionID"]').val(schedule['sectionID']).trigger('change.select2');
                }
            });
            $.ajax({
                type: "GET",
                url: './exam_schedule/get_subject_by_id/'+schedule['classesID'],
                success:function(data)
                {
                    $('select[for="subjectID"]').html(data);
                    $('select[for="subjectID"]').val(schedule['subjectID']).trigger('change.select2');
                }
            });
            window.EditID = schedule['routineID'];
        },
        complete:function()
        {
            $(".preloader").fadeOut(function(){
                $("div").remove('.preloader');
            });
        }
    });
}

$("#edit_routine").submit(function(e){
    e.preventDefault();
    $("#edit_routine").append('<div class="preloader"></div>');
    $.ajax({
        type: "POST",
        url: './routine/edit/'+EditID,
        data: $(this).serialize(),
        success:function(data)
        {
            if(data === "Updated")
            {
                $("button[data-dismiss='modal']").click();
                toastr["success"]("Routine Edited Successfully");
                $("#edit_routine input,textarea").val('');
                $('select[data-plugin="select2"]').val('').trigger('change.select2');
                view_table(sectionID,section);
            }
            else if(data === "Notupdated")
            {
                $("button[data-dismiss='modal']").click();
                toastr["error"]("Routine Not Edited, Please Try Again");
                $("#edit_routine input,textarea").val('');
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

function delete_routine(id)
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
                url: './routine/delete/'+id,
                success:function(data)
                {
                    if(data === 'Deleted')
                    {
                        view_table(sectionID,section);
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