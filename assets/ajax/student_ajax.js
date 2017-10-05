/*************** TABLE ELEMENTS START *****************/

//main table view
function view_table(secid,section)
{   
    $("#section_label").html(section);
    showtable(".student_table");
    $.fn.dataTableExt.sErrMode = 'throw';
    window.student = $('#student_table').dataTable({
        ajax: "student/student_table/"+clsid+"/"+secid,
        language: {
            "lengthMenu": "_MENU_ Records Per Page",
            "zeroRecords": "No Student Found",
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
//Main Table Ends

/*************** TABLE ELEMENTS END ******************/


/*************** FORM SUBMISSION ELEMENTS START ******************/

/*Getting Sections And Append in Section Option When Class Is selected*/
$('select[name="classesID"]').on('change',function(){
    showpreloader("#add_student,#edit_student");
    jQuery.ajax ({
        type: "GET",
        url : './section/get_section_by_id/'+$(this).find("option:selected").val()+'/option',
        success:function(data)
        {
            $("select[name='sectionID']").html(data);
        },
        complete:function()
        {
            hidepreloader();
        }
    });
});
//Getting section end

//Add student
$('#add_student').submit(function(e){
    e.preventDefault();
    showpreloader('#add_student');
    var form = new FormData(document.getElementById('add_student'));
    var file = document.getElementById('add-photo').files[0];
    if (file) {   
        form.append('add-photo', file);
    }
    jQuery.ajax({
        type: "POST",
        url: './student/add',
        data: form,
        cache: false,
        contentType: false,
        processData: false,
        success:function(data)
        {
            if(data === "Added")
            {
                setTimeout(function(){
                    student.fnReloadAjax();
                });
                $("button[data-dismiss='modal']").click();
                toastr["success"]("Student Added Successfully");
                $("#add_student input,textarea,select").val('');
                $('data-plugin="select2"').val('').trigger('change.select2');
            }
            else if(data === "Notadded")
            {
                $("button[data-dismiss='modal']").click();
                toastr["error"]("Student Not Added, Please Try Again");
                $("#add_student input,textarea,select").val('');
                $('data-plugin="select2"').val('').trigger('change.select2');
            }
            else
            {
                toastr["warning"](data);
            }
        },
        complete:function()
        {
            hidepreloader();
        }
    });
});
//Adding Student Ends

//Get Single Student Data And Fill Up The Form
function edit_student(id)
{
    $("#editing_modal").trigger('click');
    showpreloader("#edit_student");
    jQuery.ajax({
        type: "GET",
        url: './student/single/'+id,
        success:function(data)
        {
            var student = JSON.parse(data);
            
            $("input[for='name']").val(student['name']);
            $("input[for='dob']").val(student['dob']);
            $("select[for='gender']").val(student['gender']);
            $("input[for='religion']").val(student['religion']);
            $("input[for='email']").val(student['email']);
            $("input[for='phone']").val(student['phone']);
            $("textarea[for='address']").val(student['address']);
            $('#classesID').val(student['classesID']).trigger('change.select2');
            $.ajax({
                type: "GET",
                url: './section/get_section_by_id/'+student['classesID']+'/option',
                success:function(data)
                {
                    $('select[for="section"]').html(data);
                    $('select[for="section"]').val(student['sectionID']).trigger('change.select2');
                }
            });
            $("input[for='roll']").val(student['roll']);
            $('select[for="parent"]').val(student['parentID']).trigger('change.select2');
            window.EditID = student['studentID'];
        },
        complete:function()
        {
            hidepreloader();
        }
    });
}
//Form Fill Up Ends

//Edit Student Form Submition
$("#edit_student").submit(function(e){
    e.preventDefault();
    showpreloader("#edit_student");
    var form = new FormData(document.getElementById('edit_student'));
    var file = document.getElementById('edit-photo').files[0];
    if (file) {   
        form.append('edit-photo', file);
    }
    
    jQuery.ajax({
        type: "POST",
        url: './student/edit/'+EditID,
        data: form,
        cache: false,
        contentType: false,
        processData: false,
        success:function(data)
        {
            if(data === "Updated")
            {
                setTimeout(function(){
                    student.fnReloadAjax();
                });
                $("button[data-dismiss='modal']").click();
                toastr["success"]("Student Edited Successfully");
                $("#edit_student input,textarea,select").val('');
                $('data-plugin="select2"').val('').trigger('change.select2');
            }
            else if(data === "Notupdated")
            {
                $("button[data-dismiss='modal']").click();
                toastr["error"]("Student Not Edited, Please Try Again");
                $("#edit_student input,textarea,select").val('');
                $('data-plugin="select2"').val('').trigger('change.select2');
            }
            else
            {
                toastr["warning"](data);
            }
        },
        complete:function()
        {
            hidepreloader();
        }
    });
});
//Edit Student Form Submition End

//Password Change Modal Open
function pass_change(id)
{
    $("#pass_change_modal").trigger('click');
    window.pcstuid = id ;
}
//Password Change Modal End

//Password CHange Form Submition
$("#change_pass").submit(function(e){
    e.preventDefault();
    showpreloader("#change_pass");
    jQuery.ajax({
        type: "POST",
        url: './student/change_pass/'+pcstuid,
        data: $(this).serialize(),
        success:function(data)
        {
            if(data === "Changed")
            {
                setTimeout(function(){
                    student.fnReloadAjax();
                });
                $("button[data-dismiss='modal']").click();
                toastr["success"]("Password Changed Successfully");
                $("#change_pass input").val('');
            }
            else if(data === "Notchanged")
            {
                $("button[data-dismiss='modal']").click();
                toastr["error"]("Password Not Changed, Please Try Again");
                $("#change_pass input").val('');
            }
            else
            {
                toastr["warning"](data);
                $(".preloader").fadeOut();
            }
        },
        complete:function()
        {
            hidepreloader();
        }
    });
});
//Password Change Form Submition End


/*************** FORM SUBMISSION ELEMENTS END *******************/

/*************** OTHER ELEMENTS START ******************/

//View Single Studnet
function view_student(id)
{
    $("#view_modal").trigger('click');
    showpreloader("#view_student");
    jQuery.ajax({
        type: "GET",
        url: './student/single/'+id,
        success:function(data)
        {
            var student = JSON.parse(data);
            $("#teacher_image").attr("src",student['photo']);
            $("a[block='name']").html(student['name']);
            $("a[block='heading_name']").html(student['name']);
            $("td[block='email']").html(student['email']);
            $("td[block='dob']").html(student['dob']);
            $("td[block='create_date']").html(student['create_date']);
            $("td[block='gender']").html(student['gender']);
            $("td[block='religion']").html(student['religion']);
            $("td[block='email']").html(student['email']);
            $("td[block='phone']").html(student['phone']);
            $("td[block='class']").html(student['class']);
            $("td[block='section']").html(student['section']);
            $("td[block='roll']").html(student['roll']);
            $("td[block='parent']").html(student['parent']);
            $("td[block='address']").html(student['address']);
            $("td[block='username']").html(student['username']);


            jQuery.ajax({
                type: "GET",
                url: './parents/single/'+student['parentID'],
                success:function(data)
                {
                    var parent = JSON.parse(data);

                    $("td[block='pname']").html(parent['name']);
                    $("td[block='pusername']").html(parent['username']);
                    $("td[block='pphone']").html(parent['phone']);
                    $("td[block='pemail']").html(parent['email']);
                    $("td[block='pfathername']").html(parent['father_name']);
                    $("td[block='pmothername']").html(parent['mother_name']);
                    $("td[block='paddress']").html(parent['address']);
                }
            });

        },
        complete:function()
        {
            hidepreloader();
        }
    });
}
//Single Studnet View End

//Delete Student
function delete_student(id)
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

            jQuery.ajax({
                type: "POST",
                url: './student/delete/'+id,
                success:function(data)
                {
                    if(data === 'Deleted')
                    {
                        setTimeout(function(){
                            student.fnReloadAjax();
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
//Delete Studnet

//change Status
function change_status(id,status)
{
    showpreloader("body");
    jQuery.ajax({
        type: "POST",
        url: './student/change_status/'+id+'/'+status,
        success:function(data)
        {
            if(data === 'Changed')
            {
                setTimeout(function(){
                    student.fnReloadAjax();
                });
                toastr['success']('Status Changed Successfully');
                $("button[type='submit']").removeAttr('disabled');
            }
            else
            {
                setTimeout(function(){
                    student.fnReloadAjax();
                });
                toastr['error']('Status Not Changed, Try Again');
            }
        },
        complete:function()
        {
            hidepreloader();
        }
    });
}

/*************** OTHER ELEMENTS END *******************/


//End of file student_ajax.js
//location: ./asstes/ajax/student_ajax.js