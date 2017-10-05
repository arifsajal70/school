/*************** TABLE ELEMENTS START *****************/

//Teacher view table
$.fn.dataTableExt.sErrMode = 'throw';
var fee_type = $('#fee_type_table').dataTable({
    ajax: "fee_type/fee_type_table",
    language: {
        "lengthMenu": "_MENU_ Records Per Page",
        "zeroRecords": "No Fee Type Found",
        "info": "Showing page _PAGE_ of _PAGES_",
        "infoEmpty": "No records available",
        "infoFiltered": " -- Filtered from _MAX_ total records"
    },
    dom: 'Bfrtip',
    buttons: [
    'copyHtml5',
    'excelHtml5',
    'csvHtml5',
    'pdfHtml5',
    'print'
    ],
});
//teacher table view end

/*************** TABLE ELEMENTS END ******************/


/*************** FORM SUBMISSION ELEMENTS START *****************/

//add teacher form submission
$('#add_fee_type').submit(function(e){
    e.preventDefault();
    $("#add_fee_type").append('<div class="preloader"></div>');
    $.ajax({
        type: "POST",
        url: './fee_type/add',
        data: $(this).serialize(),
        success:function(data)
        {
            if(data === "Added")
            {
                setTimeout(function(){
                    fee_type.fnReloadAjax();
                });
                $("button[data-dismiss='modal']").click();
                toastr["success"]("Book Issued Successfully");
                $("#add_fee_type input,textarea").val('');
            }
            else if(data === "Notadded")
            {
                $("button[data-dismiss='modal']").click();
                toastr["error"]("Book Not Issued, Please Try Again");
                $("#add_fee_type input,textarea").val('');
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
//add teacher form submission end

//getting single teacher data for fill up editing form
function edit_feetype(id)
{
    $("#editing_modal").trigger('click');
    $("#edit_fee_type").append('<div class="preloader"></div>');
    $.ajax({
        type: "GET",
        url: './fee_type/single/'+id,
        success:function(data)
        {
            var feetype = JSON.parse(data);

            $("input[for='feetype']").val(feetype['feetype']);
            $("input[for='amount']").val(feetype['amount']);
            $("textarea[for='note']").val(feetype['note']);
            window.EditID = feetype['feetypeID'];
        },
        complete:function()
        {
            $(".preloader").fadeOut(function(){
                $("div").remove('.preloader');
            });
        }
    });
}
//getting single teacher end

//Edit teacher form submission
$("#edit_fee_type").submit(function(e){
    e.preventDefault();
    $("#edit_fee_type").append('<div class="preloader"></div>');
    $.ajax({
        type: "POST",
        url: './fee_type/edit/'+EditID,
        data: $(this).serialize(),
        success:function(data)
        {
            if(data === "Updated")
            {
                setTimeout(function(){
                    fee_type.fnReloadAjax();
                });
                $("button[data-dismiss='modal']").click();
                toastr["success"]("Book Issue Edited Successfully");
                $("#edit_issue input").val('');
            }
            else if(data === "Notupdated")
            {
                $("button[data-dismiss='modal']").click();
                toastr["error"]("Book Issue Not Edited, Please Try Again");
                $("#edit_issue input").val('');
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
//edit teacher form submission end

/*************** FORM SUBMISSION ELEMENTS END ******************/


/*************** OTHER ELEMENTS START ******************/

//deleting teacher
function delete_book(id)
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
                url: './fee_type/delete/'+id,
                success:function(data)
                {
                    if(data === 'Deleted')
                    {
                        setTimeout(function(){
                            fee_type.fnReloadAjax();
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

/*************** OTHER ELEMENTS END *******************/

//End of file fee_type_ajax.js
//location: ./asstes/ajax/fee_type_ajax.js