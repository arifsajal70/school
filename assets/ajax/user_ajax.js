/*************** TABLE ELEMENTS START *****************/

//user view table
$.fn.dataTableExt.sErrMode = 'throw';
var user = $('#user_table').dataTable({
    ajax: "user/user_table",
    language: {
        "lengthMenu": "_MENU_ Records Per Page",
        "zeroRecords": "No users Found",
        "info": "Showing page _PAGE_ of _PAGES_",
        "infoEmpty": "No records available",
        "infoFiltered": " -- Filtered from _MAX_ total records"
    },
    dom: 'Bfrtip',
    buttons: [
    {
        extend: 'pdfHtml5',
        exportOptions: {
            columns: [ 0, 1, 2 , 3 , 4 , 5 ]
        }
    },
    {
        extend: 'excelHtml5',
        exportOptions: {
            columns: [ 0, 1, 2 , 3 , 4 , 5 ]
        }
    },
    {
        extend: 'print',
        exportOptions: {
            columns: [ 0, 1, 2 , 3 , 4 , 5 ]
        }
    },
    ],
});
//user table view end

/*************** TABLE ELEMENTS END ******************/


/*************** FORM SUBMISSION ELEMENTS START *****************/

//add user form submission
$('#add_user').submit(function(e){
    e.preventDefault();
    $("#add_user").append('<div class="preloader"></div>');
    var form = new FormData(document.getElementById('add_user'));
    var file = document.getElementById('add-photo').files[0];
    if (file) { form.append('add-photo', file); }
    jQuery.ajax({
        type: "POST",
        url: './user/add',
        data: form,
        cache: false,
        contentType: false,
        processData: false,
        success:function(data)
        {
            if(data === "Added")
            {
                setTimeout(function(){
                    user.fnReloadAjax();
                });
                $("button[data-dismiss='modal']").click();
                toastr["success"]("User Added Successfully");
                $("#add_user input,textarea,select").val('');
            }
            else if(data === "Notadded")
            {
                $("button[data-dismiss='modal']").click();
                toastr["error"]("User Not Added, Please Try Again");
                $("#add_user input,textarea,select").val('');
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
//add user form submission end

//getting single user for fill up the edit user form
function edit_user(id)
{
    $("#editing_modal").trigger('click');
    $("#edit_user").append('<div class="preloader"></div>');
    jQuery.ajax({
        type: "GET",
        url: './user/single/'+id,
        success:function(data)
        { 
            var user = JSON.parse(data);
            
            $("input[for='name']").val(user['name']);
            $("input[for='dob']").val(user['dob']);
            $("select[for='sex']").val(user['sex']);
            $("input[for='religion']").val(user['religion']);
            $("input[for='email']").val(user['email']);
            $("input[for='phone']").val(user['phone']);
            $("textarea[for='address']").val(user['address']);
            $("input[for='doj']").val(user['doj']);
            $("select[for='usertype']").val(user['usertype']);
            window.EditID = user['userID'];
        },
        complete:function()
        {
            $(".preloader").fadeOut(function(){
                $("div").remove('.preloader');
            });
        }
    });
}
//getting single user for fill up the edit user form end

//edit user form submission
$("#edit_user").submit(function(e){
    e.preventDefault();
    $("#edit_user").append('<div class="preloader"></div>');
    var form = new FormData(document.getElementById('edit_user'));
    var file = document.getElementById('edit-photo').files[0];
    if (file) { form.append('edit-photo', file); }
    jQuery.ajax({
        type: "POST",
        url: './user/edit/'+EditID,
        data: form,
        cache: false,
        contentType: false,
        processData: false,
        success:function(data)
        {
            if(data === "Updated")
            {
                setTimeout(function(){
                    user.fnReloadAjax();
                });
                $("button[data-dismiss='modal']").click();
                toastr["success"]("user Edited Successfully");
                $("#edit_user input,textarea,select").val('');
            }
            else if(data === "Notupdated")
            {
                $("button[data-dismiss='modal']").click();
                toastr["error"]("user Not Edited, Please Try Again");
                $("#edit_user input,textarea,select").val('');
            }
            else
            {
                toastr["warning"](data)
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
//edit user form submission end

//pass change modal open
function pass_change(id)
{
    $("#pass_change_modal").trigger('click');
    window.userID = id ;
}
//pass change modal open end

//pass change form submission
$("#change_pass").submit(function(e){
    e.preventDefault();
    $("#change_pass").append('<div class="preloader"></div>');
    jQuery.ajax({
        type: "POST",
        url: './user/change_pass/'+userID,
        data: $(this).serialize(),
        success:function(data)
        {
            if(data === "Changed")
            {
                setTimeout(function(){
                    user.fnReloadAjax();
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
                toastr["warning"](data)
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
//pass change form submission end

/*************** FORM SUBMISSION ELEMENTS END ******************/


/*************** OTHER ELEMENTS START ******************/

//view user
function view_user(id)
{
    $("#view_modal").trigger('click');
    $("#view_user").append('<div class="preloader"></div>');
    jQuery.ajax({
        type: "GET",
        url: './user/single/'+id,
        success:function(data)
        {
            var user = JSON.parse(data);

            $("#user_image").attr("src",user['photo']);
            $("a[block='name']").html(user['name']);
            $("a[block='heading_name']").html(user['name']);
            $("p[block='designation']").html(user['designation']);
            $("td[block='dob']").html(user['dob']);
            $("td[block='doj']").html(user['doj']);
            $("td[block='gender']").html(user['sex']);
            $("td[block='religion']").html(user['religion']);
            $("td[block='email']").html(user['email']);
            $("td[block='phone']").html(user['phone']);
            $("td[block='address']").html(user['address']);
            $("td[block='username']").html(user['username']);
            $("td[block='usertype']").html(user['usertype']);
        },
        complete:function()
        {
            $(".preloader").fadeOut(function(){
                $("div").remove('.preloader');
            });
        }
    });
}
//view user end

//delete user
function delete_user(id)
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
                url: './user/delete/'+id,
                success:function(data)
                {
                    if(data === 'Deleted')
                    {
                        setTimeout(function(){
                            user.fnReloadAjax();
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
//delete user end

//activity status changed
function change_status(id,status)
{
    $("body").append('<div class="preloader"></div>');
    jQuery.ajax({
        type: "POST",
        url: './user/change_status/'+id+'/'+status,
        success:function(data)
        {
            if(data === 'Changed')
            {
                setTimeout(function(){
                    user.fnReloadAjax();
                });
                toastr['success']('Status Changed Successfully');
            }
            else
            {
                setTimeout(function(){
                    user.fnReloadAjax();
                });
                toastr['error']('Status Not Changed, Try Again');
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
//status change end

function reload_table()
{
    setTimeout(function(){
        user.fnReloadAjax();
    });
}

function print(id) 
{

  var divToPrint=document.getElementById(id);
  var newWin=window.open('','Print-Window');
  newWin.document.open();
  newWin.document.write('<head> <link rel="stylesheet" href="./assets/plugins/bootstrap4/css/bootstrap.min.css"> <link rel="stylesheet" href="./assets/css/core.css"> </head><html><body onload="window.print()" style="background-color:unset !important; width:100% !important;">'+divToPrint.innerHTML+'</body></html>');
  newWin.document.close();
  setTimeout(function(){newWin.close();},1000);

}


/*************** OTHER ELEMENTS END *******************/


//End of file user_ajax.js
//location: ./asstes/ajax/user_ajax.js