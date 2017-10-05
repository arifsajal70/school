/*************** TABLE ELEMENTS START *****************/

//view table when class selected
function view_table(id,classes)
{
    $('.section_table').slideUp();
    $('.section_table').slideDown();
    $('#class_label').html(classes);
    $.fn.dataTableExt.sErrMode = 'throw';
    window.section = $('#section_table').dataTable({
        ajax: "section/section_table/"+id,
        language: {
            "lengthMenu": "_MENU_ Records Per Page",
            "zeroRecords": "No Section Found",
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
}
//end view section table

/*************** TABLE ELEMENTS END ******************/


/*************** FORM SUBMISSION ELEMENT START ******************/

//add section
$('#add_section').submit(function(e){
    e.preventDefault();
    $("#add_section").append('<div class="preloader"></div>');
    $.ajax({
        type: "POST",
        url: './section/add',
        data: $(this).serialize(),
        success:function(data)
        {
            if(data === "Added")
            {
                setTimeout(function(){
                    section.fnReloadAjax();
                });
                $("button[data-dismiss='modal']").click();
                toastr["success"]("Section Added Successfully");
                $("#add_section input,textarea").val('');
            }
            else if(data === "Notadded")
            {
                $("button[data-dismiss='modal']").click();
                toastr["error"]("Section Not Added, Please Try Again");
                $("#add_section input,textarea").val('');
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
//add section end

//getting section data for fill up editing form
function edit_section(sid)
{
    $("#editing_modal").trigger('click');
    $("#edit_section").append('<div class="preloader"></div>');
    $.ajax({
        type: "GET",
        url: './section/single/'+sid,
        success:function(data)
        {
            var section = JSON.parse(data);
            
            $("input[for='section']").val(section['section']);
            $('select[for="classesID"]').val(section['classesID']).trigger('change.select2');
            $('select[for="teacherID"]').val(section['teacherID']).trigger('change.select2');
            $('textarea[for="note"]').val(section['note']);

            window.sectionID = section['sectionID'] ;
        },
        complete:function()
        {
            $(".preloader").fadeOut(function(){
                $("div").remove('.preloader');
            });
        }
    });
}
//geting single subjetc end


//edit section form submission
$('#edit_section').submit(function(e){
    e.preventDefault();
    $("#edit_section").append('<div class="preloader"></div>');
    $.ajax({
        type: "POST",
        url: './section/edit/'+sectionID,
        data: $(this).serialize(),
        success:function(data)
        {
            if(data === "Updated")
            {
                setTimeout(function(){
                    section.fnReloadAjax();
                });
                $("button[data-dismiss='modal']").click();
                toastr["success"]("Section Added Successfully");
                $("#edit_section input,textarea").val('');
                $(".loader").fadeOut();
            }
            else if(data === "Notupdated")
            {
                $("button[data-dismiss='modal']").click();
                toastr["error"]("Section Not Added, Please Try Again");
                $("#edit_section input,textarea").val('');
                $(".loader").fadeOut();
            }
            else
            {
                toastr["warning"](data);
                $(".loader").fadeOut();
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
//edit section form submission end

/*************** FORM SUBMISSION ELEMENT END *******************/


/*************** OTHER ELEMENT START *******************/

//delete section
function delete_section(id)
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
                url: './section/delete/'+id,
                success:function(data)
                {
                    if(data === 'Deleted')
                    {
                        setTimeout(function(){
                            section.fnReloadAjax();
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
//delete  subject end

function reload_table(table)
{
    if($('.section_table').is(":visible"))
    {
        setTimeout(function(){
            section.fnReloadAjax();
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

/*************** OTHER ELEMENT END *******************/


//End of file section_alax.js
//Location : ./assets/ajax/section_ajax.js