$.fn.dataTableExt.sErrMode = 'throw';

$("#classes").on('change',function(){
    var classesID = $(this).find("option:selected").val();
    $.ajax({
        type: "GET",
        url: './sattendance/get_section/'+classesID+'/option',
        success:function(data)
        {
            $("#find_section").html(data);
        }
    });
});


$('#get_attendance_register').submit(function(e){
    e.preventDefault();
    $("button[type='submit']").attr('disabled','disabled');
    var classesID = $(this).find("select[name='classesID'] option:selected").val();
    var sectionID = $(this).find("select[name='sectionID'] option:selected").val();
    window.date = $("input[name='date']").val();
    $.ajax({
        type: "POST",
        url: './sattendance/get_register',
        data: $(this).serialize(),
        success:function(data)
        {
            if(data === "Added")
            {
                $("button[data-dismiss='modal']").click();
                $("button[type='submit']").removeAttr('disabled');
                $("#get_attendance_register input").val('');
                $('select[name="classesID"]').val('').trigger('change.select2');
                $('select[name="sectionID"]').val('').trigger('change.select2');
                $("#student").hide();
                $("#register").show();
                window.register = $('#register_table').dataTable({
                    ajax: "./sattendance/attendance_table/"+classesID+"/"+sectionID+"/"+date,
                    language: {
                        "lengthMenu": "_MENU_ Records Per Page",
                        "zeroRecords": "No Attendance Register Found",
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
                    oLanguage: {
                        sProcessing: "<img src='./assets/img/loader.gif' width='30'>"
                    },
                    processing : true
                });
            }
            else
            {
                toastr["warning"](data);
                $("button[type='submit']").removeAttr('disabled');
            }
        }
    });
});

function change_attendance(attendanceID)
{
    $.ajax({
        type: "POST",
        url: './sattendance/change_attendance/'+attendanceID+'/'+date,
        success:function(data)
        {
            if(data === "Updated")
            {
                setTimeout(function(){
                    register.fnReloadAjax();
                });
                toastr["success"]("Attendance Status Changed");
            }
            else if(data === "Notupdated")
            {
                toastr["error"]("Attendance Status Not Changed, Please Try Again");
            }
            else
            {
                toastr["warning"](data);
            }
        }
    });
}

function get_section(id,classes)
{
    $("#student").hide();
    $("#register").hide();
    $.ajax({
        type: "POST",
        url: './sattendance/get_section/'+id+'/link',
        success:function(data)
        {
           $("#section_select").html(data);
           $("#class_label").html(classes);
           window.classesID = id ;
       }
   });
}

function view_table(sectionID,section)
{
    $("#register").hide();
    $("#student").show();
    $("#section_label").html(section);
    window.student = $('#student_table').dataTable({
        ajax: "./sattendance/student_table/"+classesID+"/"+sectionID,
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
        oLanguage: {
            sProcessing: "<img src='./assets/img/loader.gif' width='30'>"
        },
        processing : true
    });
}

function view_student(studentID)
{
    $("#view_modal").trigger('click');
    $.ajax({
        type: "GET",
        url: "./sattendance/get_single_student/"+studentID,
        success:function(data)
        {
            var details = JSON.parse(data);

            $("#image").attr('src','./uploads/'+details['student_photo']);
            $("td[block='name']").html(details['student_name']);
            $("a[block='heading_name']").html(details['student_name']);
            $("td[block='class']").html(details['student_class']);
            $("td[block='section']").html(details['student_section']);
            $("td[block='roll']").html(details['student_roll']);
            $("td[block='parent_name']").html(details['student_parent_name']);
            $("td[block='parent_phone']").html(details['student_parent_phone']);

            $("#01date").html(details['monthyear']+"-1");
            $("#02date").html(details['monthyear']+"-2");
            $("#03date").html(details['monthyear']+"-3");
            $("#04date").html(details['monthyear']+"-4");
            $("#05date").html(details['monthyear']+"-5");
            $("#06date").html(details['monthyear']+"-6");
            $("#07date").html(details['monthyear']+"-7");
            $("#08date").html(details['monthyear']+"-8");
            $("#09date").html(details['monthyear']+"-9");
            $("#10date").html(details['monthyear']+"-10");
            $("#11date").html(details['monthyear']+"-11");
            $("#12date").html(details['monthyear']+"-12");
            $("#13date").html(details['monthyear']+"-13");
            $("#14date").html(details['monthyear']+"-14");
            $("#15date").html(details['monthyear']+"-15");
            $("#16date").html(details['monthyear']+"-16");
            $("#17date").html(details['monthyear']+"-17");
            $("#18date").html(details['monthyear']+"-18");
            $("#19date").html(details['monthyear']+"-19");
            $("#20date").html(details['monthyear']+"-20");
            $("#21date").html(details['monthyear']+"-21");
            $("#22date").html(details['monthyear']+"-22");
            $("#23date").html(details['monthyear']+"-23");
            $("#24date").html(details['monthyear']+"-24");
            $("#25date").html(details['monthyear']+"-25");
            $("#26date").html(details['monthyear']+"-26");
            $("#27date").html(details['monthyear']+"-27");
            $("#28date").html(details['monthyear']+"-28");
            $("#29date").html(details['monthyear']+"-29");
            $("#30date").html(details['monthyear']+"-30");
            $("#31date").html(details['monthyear']+"-31");

            $("#1attend").html(details['01']);
            $("#2attend").html(details['02']);
            $("#3attend").html(details['03']);
            $("#4attend").html(details['04']);
            $("#5attend").html(details['05']);
            $("#6attend").html(details['06']);
            $("#7attend").html(details['07']);
            $("#8attend").html(details['08']);
            $("#9attend").html(details['09']);
            $("#10attend").html(details['10']);
            $("#11attend").html(details['11']);
            $("#12attend").html(details['12']);
            $("#13attend").html(details['13']);
            $("#14attend").html(details['14']);
            $("#15attend").html(details['15']);
            $("#16attend").html(details['16']);
            $("#17attend").html(details['17']);
            $("#18attend").html(details['18']);
            $("#19attend").html(details['19']);
            $("#20attend").html(details['20']);
            $("#21attend").html(details['21']);
            $("#22attend").html(details['22']);
            $("#23attend").html(details['23']);
            $("#24attend").html(details['24']);
            $("#25attend").html(details['25']);
            $("#26attend").html(details['26']);
            $("#27attend").html(details['27']);
            $("#28attend").html(details['28']);
            $("#29attend").html(details['29']);
            $("#30attend").html(details['30']);
            $("#31attend").html(details['31']);
        }
    });
}


//End of file sattendance_ajax.js
//location: ./asstes/ajax/sattendance_ajax.js