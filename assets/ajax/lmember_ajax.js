/*************** TABLE ELEMENTS START *****************/

//getting section for top select section
function get_section(classesid,classes)
{   
    window.classesID = classesid ;
    $("#class_label").html(classes);
    $("#lmember").hide();
    $("body").append('<div class="preloader"></div>');
    $.ajax({
        type: "GET",
        url: './student/get_section_by_id/'+classesID+'/link',
        success:function(data)
        {
            $("#section_select").html(data);
        },
        complete:function()
        {
            $(".preloader").fadeOut(function(){
                $("div").remove('.preloader');
            });
        }
    });
}
//Getting Section End

//main table view
function view_table(sectionID,section)
{   
    $("#section_label").html(section);
    $("#lmember").show();
    $("body").append('<div class="preloader"></div>');
    $.fn.dataTableExt.sErrMode = 'throw';
    window.lmember = $('#lmember_table').dataTable({
        ajax: "lmember/lmember_table/"+classesID+"/"+sectionID,
        language: {
            "lengthMenu": "_MENU_ Records Per Page",
            "zeroRecords": "No Student Found",
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
    $(".preloader").fadeOut(function(){
        $("div").remove('.preloader');
    });
}
//Main Table Ends

/*************** TABLE ELEMENTS END ******************/


/*************** FORM SUBMISSION ELEMENTS START ******************/

//add Student Into library
function add_lmember(id)
{
    $("#add_modal").trigger('click');
    window.insID = id ;
    
}
//add student to library end

//Edit Student Form Submition
$("#add_lmember").submit(function(e){
    e.preventDefault();
    $("#add_lmember").append('<div class="preloader"></div>');
    $.ajax({
        type: "POST",
        url: './lmember/add/'+insID,
        data: $(this).serialize(),
        success:function(data)
        {
            if(data === "Added")
            {
                setTimeout(function(){
                    lmember.fnReloadAjax();
                });
                $("button[data-dismiss='modal']").click();
                toastr["success"]("Member Added Successfully");
                $("#add_lmember input").val('');
            }
            else if(data === "Notadded")
            {
                $("button[data-dismiss='modal']").click();
                toastr["error"]("Member Not Added, Please Try Again");
                $("#add_lmember input").val('');
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
//Edit Student Form Submition End


//add Student Into library
function edit_lmember(id)
{
    $("#editing_modal").trigger('click');
    $("#edit_lmember").append('<div class="preloader"></div>');
    $.ajax({
        type: "GET",
        url: './lmember/single_lmember/'+id,
        success:function(data)
        {
            var lmember = JSON.parse(data);

            $("input[for='lID']").val(lmember['lID']);
            $("input[for='lbalance']").val(lmember['lbalance']);
            window.EditID = lmember['lmemberID'];
        },
        complete:function()
        {
            $(".preloader").fadeOut(function(){
                $("div").remove('.preloader');
            });
        }
    });
    
}
//add student to library end

//Edit Student Form Submition
$("#edit_lmember").submit(function(e){
    e.preventDefault();
    $("#edit_lmember").append('<div class="preloader"></div>');
    $.ajax({
        type: "POST",
        url: './lmember/edit/'+EditID,
        data: $(this).serialize(),
        success:function(data)
        {
            if(data === "Updated")
            {
                setTimeout(function(){
                    lmember.fnReloadAjax();
                });
                $("button[data-dismiss='modal']").click();
                toastr["success"]("Member Edited Successfully");
                $("#edit_lmember input").val('');
            }
            else if(data === "Notupdated")
            {
                $("button[data-dismiss='modal']").click();
                toastr["error"]("Member Not Edited, Please Try Again");
                $("#edit_lmember input").val('');
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
//Edit Student Form Submition End


/*************** FORM SUBMISSION ELEMENTS END *******************/

/*************** OTHER ELEMENTS START ******************/

//View Single Studnet
function view_student(id)
{
    $("#view_modal").trigger('click');
    $("#view_student").append('<div class="preloader"></div>');
    $.ajax({
        type: "GET",
        url: './student/single/'+id,
        success:function(data)
        {
            var student = JSON.parse(data);

            $("#teacher_image").attr("src",student['photo']);
            $("a[block='name']").html(student['name']);
            $("a[block='heading_name']").html(student['name']);
            $("p[block='email']").html(student['email']);
            $("td[block='dob']").html(student['dob']);
            $("td[block='create_date']").html(student['create_date']);
            $("td[block='gender']").html(student['sex']);
            $("td[block='religion']").html(student['religion']);
            $("td[block='email']").html(student['email']);
            $("td[block='phone']").html(student['phone']);
            $("td[block='class']").html(student['class']);
            $("td[block='section']").html(student['section']);
            $("td[block='roll']").html(student['roll']);
            $("td[block='parent']").html(student['parent']);
            $("td[block='address']").html(student['address']);
            $("td[block='username']").html(student['username']);

            window.issue = $('#issue_table').dataTable({
                ajax: "lmember/lmember_table/"+id,
                language: {
                    "lengthMenu": "_MENU_ Records Per Page",
                    "zeroRecords": "No Student Found",
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
        },
        complete:function()
        {
            $(".preloader").fadeOut(function(){
                $("div").remove('.preloader');
            });
        }
    });
}
//Single Studnet View End

//Delete Student
function delete_student(id)
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
                url: './lmember/delete/'+id,
                success:function(data)
                {
                    if(data === 'Deleted')
                    {
                        setTimeout(function(){
                            lmember.fnReloadAjax();
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
//Delete Studnet

/*************** OTHER ELEMENTS END *******************/


//End of file lmember_ajax.js
//location: ./asstes/ajax/student_ajax.js