/*************** TABLE ELEMENTS START *****************/

//Teacher view table
$.fn.dataTableExt.sErrMode = 'throw';
var teacher = $('#teachers_table').dataTable({
    ajax: "teacher/teacher_table",
    language: {
        "lengthMenu": "_MENU_ Records Per Page",
        "zeroRecords": "No Teachers Found",
        "info": "Showing page _PAGE_ of _PAGES_",
        "infoEmpty": "No records available",
        "infoFiltered": " -- Filtered from _MAX_ total records"
    },
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
//teacher table view end

/*************** TABLE ELEMENTS END ******************/


/*************** FORM SUBMISSION ELEMENTS START *****************/

//add teacher form submission
$('#add_teacher').submit(function(e){
    e.preventDefault();
    showpreloader("#add_teacher");
    var form = new FormData(document.getElementById('add_teacher'));
    var file = document.getElementById('add-photo').files[0];
    if (file) { form.append('add-photo', file); }
    jQuery.ajax({
        type: "POST",
        url: './teacher/add',
        data: form,
        cache: false,
        contentType: false,
        processData: false,
        success:function(data)
        {
            if(data === "Added")
            {
                setTimeout(function(){
                    teacher.fnReloadAjax();
                });
                $("button[data-dismiss='modal']").click();
                toastr["success"]("Teacher Added Successfully");
                $("#add_teacher input,textarea,select").val('');
            }
            else if(data === "Notadded")
            {
                $("button[data-dismiss='modal']").click();
                toastr["error"]("Teacher Not Added, Please Try Again");
                $("#add_teacher input,textarea").val('');
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
//add teacher form submission end

//getting single teacher data for fill up editing form
function edit_teacher(id)
{
    $("#editing_modal").trigger('click');
    showpreloader("#edit_teacher");
    jQuery.ajax({
        type: "GET",
        url: './teacher/single/'+id,
        success:function(data)
        {
            var teacher = JSON.parse(data);
            
            $("input[for='name']").val(teacher['name']);
            $("input[for='designation']").val(teacher['designation']);
            $("input[for='dob']").val(teacher['dob']);
            $("select[for='gender']").val(teacher['sex']);
            $("input[for='religion']").val(teacher['religion']);
            $("input[for='email']").val(teacher['email']);
            $("input[for='phone']").val(teacher['phone']);
            $("textarea[for='address']").val(teacher['address']);
            $("input[for='doj']").val(teacher['doj']);
            window.EditID = teacher['teacherID'];
        },
        complete:function()
        {
            hidepreloader();
        }
    });
}
//getting single teacher end

//Edit teacher form submission
$("#edit_teacher").submit(function(e){
    e.preventDefault();
    showpreloader("#edit_teacher");
    var form = new FormData(document.getElementById('edit_teacher'));
    var file = document.getElementById('e_photo').files[0];
    if (file) { form.append('e_photo', file); }
    jQuery.ajax({
        type: "POST",
        url: './teacher/edit/'+EditID,
        data: form,
        cache: false,
        contentType: false,
        processData: false,
        success:function(data)
        {
            if(data === "Updated")
            {
                setTimeout(function(){
                    teacher.fnReloadAjax();
                });
                $("button[data-dismiss='modal']").click();
                toastr["success"]("Teacher Edited Successfully");
                $("#edit_teacher input,textarea").val('');
            }
            else if(data === "Notupdated")
            {
                $("button[data-dismiss='modal']").click();
                toastr["error"]("Teacher Not Edited, Please Try Again");
                $("#edit_teacher input,textarea").val('');
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
//edit teacher form submission end

//password changing modal open and getting teacher id
function pass_change(id)
{
    $("#pass_change_modal").trigger('click');
    window.teacherID = id ;
}


//change password form submission
$("#change_pass").submit(function(e){
    e.preventDefault();
    showpreloader("#change_pass");
    jQuery.ajax({
        type: "POST",
        url: './teacher/change_pass/'+teacherID,
        data: $(this).serialize(),
        success:function(data)
        {
            if(data === "Changed")
            {
                setTimeout(function(){
                    teacher.fnReloadAjax();
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
            }
        },
        complete:function()
        {
            hidepreloader();
        }
    });
});
//change password form submission end

/*************** FORM SUBMISSION ELEMENTS END ******************/


/*************** OTHER ELEMENTS START ******************/

//getting single teacher data for viewing
function view_teacher(id)
{
    $("#view_modal").trigger('click');
    showpreloader("#view_teacher");
    jQuery.ajax({
        type: "GET",
        url: './teacher/single/'+id,
        success:function(data)
        {
            var teacher = JSON.parse(data);

            $("#teacher_image").attr("src",teacher['photo']);
            $("a[block='name']").html(teacher['name']);
            $("a[block='heading_name']").html(teacher['name']);
            $("p[block='designation']").html(teacher['designation']);
            $("td[block='dob']").html(teacher['dob']);
            $("td[block='doj']").html(teacher['doj']);
            $("td[block='gender']").html(teacher['sex']);
            $("td[block='religion']").html(teacher['religion']);
            $("td[block='email']").html(teacher['email']);
            $("td[block='phone']").html(teacher['phone']);
            $("td[block='address']").html(teacher['address']);
            $("td[block='username']").html(teacher['username']);
        },
        complete:function()
        {
            hidepreloader();
        }
    });
}
//getting single teacher end


//deleting teacher
function delete_teacher(id)
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
                url: './teacher/delete/'+id,
                success:function(data)
                {
                    if(data === 'Deleted')
                    {
                        setTimeout(function(){
                            teacher.fnReloadAjax();
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
//delete teacher

//activity status changed
function change_status(id,status)
{
    showpreloader("body");
    jQuery.ajax({
        type: "POST",
        url: './teacher/change_status/'+id+'/'+status,
        success:function(data)
        {
            if(data === 'Changed')
            {
                setTimeout(function(){
                    teacher.fnReloadAjax();
                });
                toastr['success']('Status Changed Successfully');
            }
            else
            {
                setTimeout(function(){
                    teacher.fnReloadAjax();
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
//status change end

/*************** OTHER ELEMENTS END *******************/


//End of file teacher_ajax.js
//location: ./asstes/ajax/teacher_ajax.js