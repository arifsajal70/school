/*************** TABLE ELEMENTS START *****************/

//classes table view
$.fn.dataTableExt.sErrMode = 'throw';
var classes = $('#class_table').dataTable({
    ajax: "classes/classes_table",
    language: {
        "lengthMenu": "_MENU_ Records Per Page",
        "zeroRecords": "No Class Found",
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
//classes table end

/*************** TABLE ELEMENTS END ******************/


/*************** FORM SUBMISSION ELEMENTS START *****************/

//add classes
$('#add_classes').submit(function(e){
    e.preventDefault();
    $("#add_classes").append('<div class="preloader"></div>');
    jQuery.ajax({
        type: "POST",
        url: './classes/add',
        data: $(this).serialize(),
        success:function(data)
        {
            if(data === "Added")
            {
                setTimeout(function(){
                    classes.fnReloadAjax();
                });
                $("button[data-dismiss='modal']").click();
                toastr["success"]("Class Added Successfully");
                $("#add_classes input,textarea").val('');
                $('data-plugin="select2"').val('').trigger('change.select2');
            }
            else if(data === "Notadded")
            {
                $("button[data-dismiss='modal']").click();
                toastr["error"]("classes Not Added, Please Try Again");
                $("#add_classes input,textarea").val('');
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
//add class end


//get single class for fill up the editing form
function edit_classes(id)
{
    $("#editing_modal").trigger('click');
    $("#edit_classes").append('<div class="preloader"></div>');
    jQuery.ajax({
        type: "GET",
        url: './classes/single/'+id,
        success:function(data)
        {
            var classes = JSON.parse(data);
            
            $("input[for='classes']").val(classes['classes']);
            $("input[for='classes_numeric']").val(classes['classes_numeric']);
            $('select[for="teacherID"]').val(classes['teacherID']).trigger('change.select2');
            $("textarea[for='note']").val(classes['note']);

            window.EditID = id;
        },
        complete:function()
        {
            $(".preloader").fadeOut(function(){
                $("div").remove('.preloader');
            });
        }
    });
}
//getting single data end


//edit class
$("#edit_classes").submit(function(e){
    e.preventDefault();
    $("#edit_classes").append('<div class="preloader"></div>');
    jQuery.ajax({
        type: "POST",
        url: './classes/edit/'+EditID,
        data: $(this).serialize(),
        success:function(data)
        {
            if(data === "Updated")
            {
                setTimeout(function(){
                    classes.fnReloadAjax();
                });
                $("button[data-dismiss='modal']").click();
                toastr["success"]("classes Edited Successfully");
                $("#edit_classes input,textarea").val('');
                $('data-plugin="select2"').val('').trigger('change.select2');
            }
            else if(data === "Notupdated")
            {
                $("button[data-dismiss='modal']").click();
                toastr["error"]("classes Not Edited, Please Try Again");
                $("#edit_classes input,textarea").val('');
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
//edit class end

/*************** FORM SUBMISSION ELEMENTS END ******************/


/*************** OTHER ELEMENTS START ******************/

//delete class
function delete_classes(id)
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
                url: './classes/delete/'+id,
                success:function(data)
                {
                    if(data === 'Deleted')
                    {
                        setTimeout(function(){
                          classes.fnReloadAjax();
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
//delete class end

function reload_table(table)
{
    setTimeout(function(){
        classes.fnReloadAjax();
    });
}

/*************** OTHER ELEMENTS END *******************/


//End of file class_ajax.js
//location: ./asstes/ajax/class_ajax.js