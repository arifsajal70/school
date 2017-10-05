/*************** TABLE ELEMENTS START *****************/

//view subject table
function view_table(id,classes)
{
    $("#class_label").html(classes);
    $('button[onclick="reload_table()"]').show();
    $(".subject_table").slideUp();
    $(".subject_table").slideDown();
    $.fn.dataTableExt.sErrMode = 'throw';
    window.subject = $('#subject_table').dataTable({
        ajax: "subject/subject_table/"+id,
        language: {
            "lengthMenu": "_MENU_ Records Per Page",
            "zeroRecords": "No Subject Found",
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
}
//view subject table end

/*************** TABLE ELEMENTS END ******************/


/*************** FORM SUBMISSION ELEMENTS START ******************/

//add subject form submission
$('#add_subject').submit(function(e){
    e.preventDefault();
    $("#add_subject").append('<div class="preloader"></div>');
    $.ajax({
        type: "POST",
        url: './subject/add',
        data: $(this).serialize(),
        success:function(data)
        {
            if(data === "Added")
            {
                setTimeout(function(){
                    subject.fnReloadAjax();
                });
                $("button[data-dismiss='modal']").click();
                toastr["success"]("Subject Added Successfully");
                $("#add_subject input").val('');
                $('select[data-plugin="select2"]').val('').trigger('change.select2');
            }
            else if(data === "Notadded")
            {
                $("button[data-dismiss='modal']").click();
                toastr["error"]("Subject Not Added, Please Try Again");
                $("#add_subject input").val('');
                $('select[data-plugin="select2"]').val('').trigger('change.select2');
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
//add subject form submission end

//getting single exam for fill up editing form
function edit_subject(id)
{
    $("#editing_modal").trigger('click');
    $("#edit_subject").append('<div class="preloader"></div>');
    $.ajax({
        type: "GET",
        url: './subject/single/'+id,
        success:function(data)
        {
            var subject = JSON.parse(data);
            
            $("input[for='subject']").val(subject['subject']);
            $("input[for='subject_author']").val(subject['subject_author']);
            $('select[for="classesID"]').val(subject['classesID']).trigger('change.select2');
            $('select[for="teacherID"]').val(subject['teacherID']).trigger('change.select2');
            $("input[for='subject_code']").val(subject['subject_code']);

            window.EditID = subject['subjectID'];
        },
        complete:function()
        {
            $(".preloader").fadeOut(function(){
                $("div").remove('.preloader');
            });
        }
    });
}
//getting single exam for fill up editing form end

//edit subject form submission
$("#edit_subject").submit(function(e){
    e.preventDefault();
    $("#edit_subject").append('<div class="preloader"></div>');
    $.ajax({
        type: "POST",
        url: './subject/edit/'+EditID,
        data: $(this).serialize(),
        success:function(data)
        {
            if(data === "Updated")
            {
                setTimeout(function(){
                    subject.fnReloadAjax();
                });
                $("button[data-dismiss='modal']").click();
                toastr["success"]("Subject Edited Successfully");
                $("#edit_subject input").val('');
                $('select[data-plugin="select2"]').val('').trigger('change.select2');
            }
            else if(data === "Notupdated")
            {
                $("button[data-dismiss='modal']").click();
                toastr["error"]("subject Not Edited, Please Try Again");
                $("#edit_subject input").val('');
                $('select[data-plugin="select2"]').val('').trigger('change.select2');
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
//edit subject form submission end

/*************** FORM SUBMISSION ELEMENTS END *******************/


/*************** OTHER ELEMENTS START *******************/

//delete sunject
function delete_subject(id)
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
                url: './subject/delete/'+id,
                success:function(data)
                {
                    if(data === 'Deleted')
                    {
                        setTimeout(function(){
                            subject.fnReloadAjax();
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
//delete sunject end

function reload_table(table)
{
    if($('.subject_table').is(":visible"))
    {
        setTimeout(function(){
            subject.fnReloadAjax();
        });
    }
    else
    {
        swal({
            title: 'No Table Visible',
            text: 'Select Class First',
            type: 'error',
            confirmButtonClass: 'btn btn-primary btn-lg',
            buttonsStyling: false
        });
    }
}

/*************** OTHER ELEMENTS END ********************/

//End of file subject_ajax.js
//location: ./asstes/ajax/subject_ajax.js