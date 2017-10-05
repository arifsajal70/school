/*************** TABLE ELEMENTS START *****************/

//Parents View Table
$.fn.dataTableExt.sErrMode = 'throw';
var parents = $('#teachers_table').dataTable({
    ajax: "parents/parents_table",
    language: {
        "lengthMenu": "_MENU_ Records Per Page",
        "zeroRecords": "No Parents Found",
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
//Parents View Table end

/*************** TABLE ELEMENTS END *****************/


/*************** FORM SUBMISSION ELEMENTS START *****************/

//add parent Form Submission
$('#add_parents').submit(function(e){
    e.preventDefault();
    showpreloader("#add_parents");
    var form = new FormData(document.getElementById('add_parents'));
    var file = document.getElementById('add-photo').files[0];
    if (file) { form.append('add-photo', file); }
    jQuery.ajax({
        type: "POST",
        url: './parents/add',
        data: form,
        cache: false,
        contentType: false,
        processData: false,
        success:function(data)
        {
            if(data === "Added")
            {
                setTimeout(function(){
                    parents.fnReloadAjax();
                });
                $("button[data-dismiss='modal']").click();
                toastr["success"]("Parents Added Successfully");
                $("#add_parents input,textarea").val('');
            }
            else if(data === "Notadded")
            {
                $("button[data-dismiss='modal']").click();
                toastr["error"]("Parents Not Added, Please Try Again");
                $("#add_parents input,textarea").val('');
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
//Add Parent form submission end


//getting parents data for fill up editing form
function edit_parent(id)
{
    $("#editing_modal").trigger('click');
    showpreloader("#edit_parents");
    jQuery.ajax({
        type: "GET",
        url: './parents/single/'+id,
        success:function(data)
        {
            var parent = JSON.parse(data);
            
            $("input[for='name']").val(parent['name']);
            $("input[for='father_name']").val(parent['father_name']);
            $("input[for='mother_name']").val(parent['mother_name']);
            $("input[for='father_profession']").val(parent['father_profession']);
            $("input[for='mother_profession']").val(parent['mother_profession']);
            $("input[for='email']").val(parent['email']);
            $("input[for='phone']").val(parent['phone']);
            $("textarea[for='address']").val(parent['address']);
            window.EditID = parent['parentID'];
        },
        complete:function()
        {
            hidepreloader();
        }
    });
}
//end getting data

//edit parent
$("#edit_parents").submit(function(e){
    e.preventDefault();
    showpreloader("#edit_parents");
    var form = new FormData(document.getElementById('edit_parents'));
    var file = document.getElementById('edit-photo').files[0];
    if (file) { form.append('edit-photo', file); }
    jQuery.ajax({
        type: "POST",
        url: './parents/edit/'+EditID,
        data: form,
        cache: false,
        contentType: false,
        processData: false,
        success:function(data)
        {
            if(data === "Updated")
            {
                setTimeout(function(){
                    parents.fnReloadAjax();
                });
                $("button[data-dismiss='modal']").click();
                toastr["success"]("Parents Edited Successfully");
                $("#edit_parents input,textarea").val('');
            }
            else if(data === "Notupdated")
            {
                $("button[data-dismiss='modal']").click();
                toastr["error"]("Parents Not Edited, Please Try Again");
                $("#edit_parents input,textarea").val('');
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


//password change modal open
function pass_change(id)
{
    $("#pass_change_modal").trigger('click');
    window.pcparid = id ;
}


//password change
$("#change_pass").submit(function(e){
    e.preventDefault();
    showpreloader("#change_pass");
    jQuery.ajax({
        type: "POST",
        url: './parents/change_pass/'+pcparid,
        data: $(this).serialize(),
        success:function(data)
        {
            if(data === "Changed")
            {
                setTimeout(function(){
                    parents.fnReloadAjax();
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

/*************** FORM SUBMISSION ELEMENTS END ******************/


/*************** OTHER ELEMENTS START ******************/

//view parent
function view_parent(id)
{
    $("#view_modal").trigger('click');
    showpreloader("#view_parent");
    jQuery.ajax({
        type: "GET",
        url: './parents/single/'+id,
        success:function(data)
        {
            var teacher = JSON.parse(data);

            $("#parents_image").attr("src",teacher['photo']);
            $("a[block='name']").html(teacher['name']);
            $("a[block='heading_name']").html(teacher['name']);
            $("p[block='email']").html(teacher['email']);
            $("td[block='father_name']").html(teacher['father_name']);
            $("td[block='mother_name']").html(teacher['mother_name']);
            $("td[block='father_profession']").html(teacher['father_profession']);
            $("td[block='mother_profession']").html(teacher['mother_profession']);
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



//delete parent
function delete_parent(id)
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
                url: './parents/delete/'+id,
                success:function(data)
                {
                    if(data === 'Deleted')
                    {
                        setTimeout(function(){
                            parents.fnReloadAjax();
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

//activity status change
function change_status(id,status)
{
    showpreloader("body");
    $.ajax({
        type: "POST",
        url: './parents/change_status/'+id+'/'+status,
        success:function(data)
        {
            if(data === 'Changed')
            {
                setTimeout(function(){
                    parents.fnReloadAjax();
                });
                toastr['success']('Status Changed Successfully');
            }
            else
            {
                setTimeout(function(){
                    parents.fnReloadAjax();
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

//End of file parents_ajax.js
//location: ./asstes/ajax/parents_ajax.js