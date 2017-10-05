/*************** TABLE ELEMENTS START *****************/

//grade table view
$.fn.dataTableExt.sErrMode = 'throw';
var grade = $('#grade_table').dataTable({
    ajax: "grade/grade_table",
    language: {
        "lengthMenu": "_MENU_ Records Per Page",
        "zeroRecords": "No Grade Found",
        "info": "Showing page _PAGE_ of _PAGES_",
        "infoEmpty": "No records available",
        "infoFiltered": " -- Filtered from _MAX_ total records"
    },
    dom: 'Bfrtip',
    buttons: [
    'pdfHtml5',
    'excelHtml5',
    'print'
    ],
});
//grade table view end

/*************** TABLE ELEMENTS END ******************/


/*************** FORM SUBMISSION ELEMENTS START ******************/

//add grade 
$('#add_grade').submit(function(e){
    e.preventDefault();
    $("#add_grade").append('<div class="preloader"></div>');
    $.ajax({
        type: "POST",
        url: './grade/add',
        data: $(this).serialize(),
        success:function(data)
        {
            if(data === "Added")
            {
                setTimeout(function(){
                    grade.fnReloadAjax();
                });
                $("button[data-dismiss='modal']").click();
                toastr["success"]("Grade Added Successfully");
                $("#add_grade input,textarea").val('');
            }
            else if(data === "Notadded")
            {
                $("button[data-dismiss='modal']").click();
                toastr["error"]("Grade Not Added, Please Try Again");
                $("#add_grade input,textarea").val('');
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

function edit_grade(id)
{
    $("#editing_modal").trigger('click');
    $("#edit_grade").append('<div class="preloader"></div>');
    $.ajax({
        type: "GET",
        url: './grade/single/'+id,
        success:function(data)
        {
            var grade = JSON.parse(data);
            
            $("input[for='grade']").val(grade['grade']);
            $("input[for='point']").val(grade['point']);
            $("input[for='gradefrom']").val(grade['gradefrom']);
            $("input[for='gradeupto']").val(grade['gradeupto']);
            $("textarea[for='note']").val(grade['note']);
            window.EditID = grade['gradeID'];
        },
        complete:function()
        {
            $(".preloader").fadeOut(function(){
                $("div").remove('.preloader');
            });
        }
    });
}

$("#edit_grade").submit(function(e){
    e.preventDefault();
    $("#edit_grade").append('<div class="preloader"></div>');
    $.ajax({
        type: "POST",
        url: './grade/edit/'+EditID,
        data: $(this).serialize(),
        success:function(data)
        {
            if(data === "Updated")
            {
                setTimeout(function(){
                    grade.fnReloadAjax();
                });
                $("button[data-dismiss='modal']").click();
                toastr["success"]("Grade Edited Successfully");
                $("#edit_grade input,textarea").val('');
            }
            else if(data === "Notupdated")
            {
                $("button[data-dismiss='modal']").click();
                toastr["error"]("Grade Not Edited, Please Try Again");
                $("#edit_grade input,textarea").val('');
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


function delete_grade(id)
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
                url: './grade/delete/'+id,
                success:function(data)
                {
                    if(data === 'Deleted')
                    {
                        setTimeout(function(){
                            grade.fnReloadAjax();
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


//End of file grade_ajax.js
//location: ./asstes/ajax/grade_ajax.js