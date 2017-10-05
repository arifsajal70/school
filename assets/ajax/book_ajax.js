/*************** TABLE ELEMENTS START *****************/

//Teacher view table
//$.fn.dataTableExt.sErrMode = 'throw';
var book = $('#book_table').dataTable({
    ajax: "book/book_table",
    language: {
        "lengthMenu": "_MENU_ Records Per Page",
        "zeroRecords": "No Book Found",
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
$('#add_book').submit(function(e){
    e.preventDefault();
    $("#add_book").append('<div class="preloader"></div>');
    $.ajax({
        type: "POST",
        url: './book/add',
        data: $(this).serialize(),
        success:function(data)
        {
            if(data === "Added")
            {
                setTimeout(function(){
                    book.fnReloadAjax();
                });
                $("button[data-dismiss='modal']").click();
                toastr["success"]("Book Added Successfully");
                $("#add_book input").val('');
            }
            else if(data === "Notadded")
            {
                $("button[data-dismiss='modal']").click();
                toastr["error"]("Book Not Added, Please Try Again");
                $("#add_book input").val('');
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
function edit_book(id)
{
    $("#editing_modal").trigger('click');
    $("#edit_book").append('<div class="preloader"></div>');
    $.ajax({
        type: "GET",
        url: './book/single/'+id,
        success:function(data)
        {
            var book = JSON.parse(data);
            
            $("input[for='name']").val(book['name']);
            $("input[for='author']").val(book['author']);
            $("input[for='book_code']").val(book['book_code']);
            $("input[for='price']").val(book['price']);
            $("input[for='quantity']").val(book['quantity']);
            $("input[for='rack']").val(book['rack']);
            window.EditID = book['bookID'];
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
$("#edit_book").submit(function(e){
    e.preventDefault();
    $("#edit_book").append('<div class="preloader"></div>');
    $.ajax({
        type: "POST",
        url: './book/edit/'+EditID,
        data: $(this).serialize(),
        success:function(data)
        {
            if(data === "Updated")
            {
                setTimeout(function(){
                    book.fnReloadAjax();
                });
                $("button[data-dismiss='modal']").click();
                toastr["success"]("Book Edited Successfully");
                $("#edit_book input").val('');
            }
            else if(data === "Notupdated")
            {
                $("button[data-dismiss='modal']").click();
                toastr["error"]("Book Not Edited, Please Try Again");
                $("#edit_book input").val('');
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
                url: './book/delete/'+id,
                success:function(data)
                {
                    if(data === 'Deleted')
                    {
                        setTimeout(function(){
                            book.fnReloadAjax();
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


//End of file teacher_ajax.js
//location: ./asstes/ajax/teacher_ajax.js