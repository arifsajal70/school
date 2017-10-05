/*************** TABLE ELEMENTS START *****************/

//View exam Table
$.fn.dataTableExt.sErrMode = 'throw';
var examtable = $('#teachers_table').dataTable({
    ajax: "exam/exam_table",
    language: {
        "lengthMenu": "_MENU_ Records Per Page",
        "zeroRecords": "No Exam Found",
        "info": "Showing page _PAGE_ of _PAGES_",
        "infoEmpty": "No records available",
        "infoFiltered": " -- Filtered from _MAX_ total records"
    },
    dom: 'Bfrtip',
    buttons: [
    {
        extend: 'pdfHtml5',
        exportOptions: {
            columns: [ 0, 1, 2 , 3 ]
        }
    },
    {
        extend: 'excelHtml5',
        exportOptions: {
            columns: [ 0, 1, 2 , 3 ]
        }
    },
    {
        extend: 'print',
        exportOptions: {
            columns: [ 0, 1, 2 , 3 ]
        }
    },
    ],
});
//view end  

/*************** TABLE ELEMENTS END ******************/


/*************** FORM SUBMISSION ELEMENTS START ******************/

//add exam form submission
$('#add_exam').submit(function(e){
    e.preventDefault();
    $("#add_exam").append('<div class="preloader"></div>');
    $.ajax({
        type: "POST",
        url: './exam/add',
        data: $(this).serialize(),
        success:function(data)
        {
            if(data === "Added")
            {
                setTimeout(function(){
                    examtable.fnReloadAjax();
                });
                $("button[data-dismiss='modal']").click();
                toastr["success"]("Exam Added Successfully");
                $("#add_exam input,textarea").val('');
            }
            else if(data === "Notadded")
            {
                $("button[data-dismiss='modal']").click();
                toastr["error"]("Exam Not Added, Please Try Again");
                $("#add_exam input,textarea").val('');
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
//add exam form submission end

//getting single exam for fill up editing form
function edit_exam(id)
{
    $("#editing_modal").trigger('click');
    $("#edit_exam").append('<div class="preloader"></div>');
    $.ajax({
        type: "GET",
        url: './exam/single/'+id,
        success:function(data)
        {
            var exam = JSON.parse(data);
            
            $("input[for='exam']").val(exam['exam']);
            $("input[for='date']").val(exam['date']);
            $("textarea[for='note']").val(exam['note']);
            window.EditID = exam['examID'];
        },
        complete:function()
        {
            $(".preloader").fadeOut(function(){
                $("div").remove('.preloader');
            });
        }
    });
}
//getting single exam for fill up editing form

//edit exam form submission
$("#edit_exam").submit(function(e){
    e.preventDefault();
    $("#edit_exam").append('<div class="preloader"></div>');
    $.ajax({
        type: "POST",
        url: './exam/edit/'+EditID,
        data: $(this).serialize(),
        success:function(data)
        {
            if(data === "Updated")
            {
                setTimeout(function(){
                    examtable.fnReloadAjax();
                });
                $("button[data-dismiss='modal']").click();
                toastr["success"]("Exam Edited Successfully");
                $("#edit_exam input,textarea").val('');
            }
            else if(data === "Notupdated")
            {
                $("button[data-dismiss='modal']").click();
                toastr["error"]("Exam Not Edited, Please Try Again");
                $("#edit_exam input,textarea").val('');
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
//edit exam form submission end

/*************** FORM SUBMISSION ELEMENTS END *******************/

/*************** OTHER ELEMENTS START *******************/

//delete exam
function delete_exam(id)
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
                url: './exam/delete/'+id,
                success:function(data)
                {
                    if(data === 'Deleted')
                    {
                        setTimeout(function(){
                            examtable.fnReloadAjax();
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
//delete exam end

function reload_table(table)
{
    setTimeout(function(){
        examtable.fnReloadAjax();
    });
}

/*************** OTHER ELEMENTS END ********************/

//End of file exam_ajax.js
//location: ./asstes/ajax/exam_ajax.js