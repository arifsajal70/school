/*************** TABLE ELEMENTS START *****************/

//Teacher view table
$.fn.dataTableExt.sErrMode = 'throw';
var issue = $('#issue_table').dataTable({
    ajax: "issue/issue_table",
    language: {
        "lengthMenu": "_MENU_ Records Per Page",
        "zeroRecords": "No Issue Found",
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
});
//teacher table view end

/*************** TABLE ELEMENTS END ******************/


/*************** FORM SUBMISSION ELEMENTS START *****************/

//add teacher form submission
$('#issue_book').submit(function(e){
    e.preventDefault();
    $("#issue_book").append('<div class="preloader"></div>');
    $.ajax({
        type: "POST",
        url: './issue/add',
        data: $(this).serialize(),
        success:function(data)
        {
            if(data === "Added")
            {
                setTimeout(function(){
                    issue.fnReloadAjax();
                });
                $("button[data-dismiss='modal']").click();
                toastr["success"]("Book Issued Successfully");
                $("#issue_book input").val('');
                $('data-plugin="select2"').val('').trigger('change.select2');
            }
            else if(data === "Notadded")
            {
                $("button[data-dismiss='modal']").click();
                toastr["error"]("Book Not Issued, Please Try Again");
                $("#issue_book input").val('');
                $('data-plugin="select2"').val('').trigger('change.select2');
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
    $("#edit_issue").append('<div class="preloader"></div>');
    $.ajax({
        type: "GET",
        url: './issue/single/'+id,
        success:function(data)
        {
            var issue = JSON.parse(data);
            
            $("select[for='lID']").val(issue['lID']).trigger('change.select2');
            $("select[for='bookID']").val(issue['bookID']).trigger('change.select2');
            $("input[for='due_date']").val(issue['due_date']);
            $("input[for='fine']").val(issue['fine']);
            $("textarea[for='note']").val(issue['note']);
            window.EditID = issue['issueID'];
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
$("#edit_issue").submit(function(e){
    e.preventDefault();
    $("#edit_issue").append('<div class="preloader"></div>');
    $.ajax({
        type: "POST",
        url: './issue/edit/'+EditID,
        data: $(this).serialize(),
        success:function(data)
        {
            if(data === "Updated")
            {
                setTimeout(function(){
                    issue.fnReloadAjax();
                });
                $("button[data-dismiss='modal']").click();
                toastr["success"]("Book Issue Edited Successfully");
                $("#edit_issue input").val('');
                $('data-plugin="select2"').val('').trigger('change.select2');
            }
            else if(data === "Notupdated")
            {
                $("button[data-dismiss='modal']").click();
                toastr["error"]("Book Issue Not Edited, Please Try Again");
                $("#edit_issue input").val('');
                $('data-plugin="select2"').val('').trigger('change.select2');
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

//return Book
function return_book(id)
{
    $("body").append('<div class="preloader"></div>');
    $.ajax({
        type: "GET",
        url: './issue/return_book/'+id,
        data: $(this).serialize(),
        success:function(data)
        {
            if(data === "Updated")
            {
                setTimeout(function(){
                    issue.fnReloadAjax();
                });
                toastr["success"]("Book Returned Successfully");
            }
            else if(data === "Notupdated")
            {
                toastr["error"]("Book Not Returned, Please Try Again");
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
                url: './issue/delete/'+id,
                success:function(data)
                {
                    if(data === 'Deleted')
                    {
                        setTimeout(function(){
                            issue.fnReloadAjax();
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