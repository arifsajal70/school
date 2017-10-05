/*************** TABLE ELEMENTS START *****************/

//view student table when section is selected
function view_table(secid,section)
{   
	$("#section_label").html(section);
	hidetable('.mark_sheet_table');
	showtable('.student_mark_table');
	$.fn.dataTableExt.sErrMode = 'throw';
	window.mark = $('#student_mark_table').dataTable({
		ajax: "mark/mark_table/"+clsid+"/"+secid,
		language: {
			"lengthMenu": "_MENU_ Records Per Page",
			"zeroRecords": "No Mark Sheet Found",
			"info": "Showing page _PAGE_ of _PAGES_",
			"infoEmpty": "No records available",
			"infoFiltered": " -- Filtered from _MAX_ total records"
		},
		destroy: true,
		dom: 'Bfrtip',
		buttons: [
		'pdfHtml5',
		'excelHtml5',
		'print'
		],
	});
}
//view student end

/*************** TABLE ELEMENTS END ******************/

/*************** FORM SUBMISSION ELEMENTS START ******************/

//getting section and subject when class is selected
$('select[name="classesID"]').on('change',function(){
	showpreloader("#add_mark");
	var classesID = $(this).find("option:selected").val();
	$.ajax ({
		type: "GET",
		url : './mark/get_section_by_id/'+classesID+'/option',
		success:function(data)
		{
			$("select[name='sectionID']").html(data);
		}
	});
	$.ajax ({
		type: "GET",
		url : './subject/get_subject_by_id/'+classesID,
		success:function(data)
		{
			$("select[name='subjectID']").html(data);
		},
        complete:function()
        {
            hidepreloader('#add_mark');
        }
	});
});
//getting section end

//adding mark form submission
$('#add_mark').submit(function(e){
	e.preventDefault();
	showpreloader("#add_mark");
	$.ajax({
		type: "POST",
		url: './mark/add',
		data: $(this).serialize(),
		success:function(data)
		{
			if(data === "Added" || data === "Alreadyadded")
			{
				if(data === "Added")
				{
					toastr['success']("Mark Sheet Added Successfully");
				}
				else if(data === 'Alreadyadded')
				{
					toastr['success']("Mark Sheet Already Added, You Can Edit This");
				}
				$("button[data-dismiss='modal']").click();

				hidetable(".student_mark_table");
				showtable(".mark_sheet_table");
				window.examID = $('select[name="examID"]').val();
				window.classesID = $('select[name="classesID"]').val();
				window.sectionID = $('select[name="sectionID"]').val();
				window.subjectID = $('select[name="subjectID"]').val();

				$.fn.dataTableExt.sErrMode = 'throw';
				window.mark_sheet = $('#mark_sheet_table').dataTable({
					ajax: "mark/mark_sheet_table/"+examID+"/"+classesID+"/"+sectionID+"/"+subjectID,
					language: {
						"lengthMenu": "_MENU_ Records Per Page",
						"zeroRecords": "No Mark Sheet Found",
						"info": "Showing page _PAGE_ of _PAGES_",
						"infoEmpty": "No records available",
						"infoFiltered": " -- Filtered from _MAX_ total records"
					},
					destroy: true,
					dom: 'Bfrtip',
					buttons: [
					'pdfHtml5',
					'excelHtml5',
					'print'
					],
				});

				$('select[data-plugin="select2"]').val('').trigger('change.select2');

			}
			else if(data === "Notadded")
			{
				$("button[data-dismiss='modal']").click();
				toastr["error"]("Mark Sheet Not Added, Please Try Again");
				$('select[data-plugin="select2"]').val('').trigger('change.select2');
			}
			else if(data === "Nostudent")
			{
				toastr["error"]("No Student Found");
			}
			else
			{
				toastr["warning"](data);
			}
		},
        complete:function()
        {
            hidepreloader('#add_mark');
        }
	});
});
//adding mark form submission end

//saving mark given in  add mark table
function save_mark(id,value)
{
	$("body").append('<div class="preloader"></div>');
	var mark = {mark:value};
	$.ajax({
		type: "POST",
		url: './mark/save_mark/'+id,
		data: mark,
		success:function(data)
		{
			if(data === "Updated")
			{
				toastr['success']('Mark Is Set To '+value);
				setTimeout(function(){
					mark_sheet.fnReloadAjax();
				});
			}
			else if(data === "Notupdated")
			{
				toastr['error']('Can Not Update Mark, Please Try Again');
			}
			else
			{
				toastr['warning'](data);
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
//saving mark end

/*************** FORM SUBMISSION ELEMENTS START ******************/


/*************** OTHER ELEMENTS START ******************/

//student wise view result
function view_result(id)
{
	$("#view_modal").trigger('click');
	$("#vew_mark").append('<div class="preloader"></div>');
	$.ajax({
		type: "GET",
		url: './mark/single_student/'+id,
		success:function(data)
		{
			var student = JSON.parse(data);

			$("#image").attr("src",student['photo']);
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

			$.fn.dataTableExt.sErrMode = 'throw';
			window.mark_sheet = $('#marks_table').dataTable({
				ajax: "./mark/marks_table/"+student['studentID'],
				language: {
					"lengthMenu": "_MENU_ Records Per Page",
					"zeroRecords": "No Mark Sheet Found",
					"info": "",
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
				columnDefs: [
				{
					"targets": [ 0 ],
					"visible": false,
				}
				],
				drawCallback: function (settings) {
					var api = this.api();
					var rows = api.rows({ page: 'current' }).nodes();
					var last = null;

					api.column(0, { page: 'current' }).data().each(function (group, i) {

						if (last !== group) {

							$(rows).eq(i).before(
								'<tr><td colspan="8" style="background-color:rgba(0, 153, 255, 0.1);">' +group+ '</td></tr><br>'
								);

							last = group;
						}
					});
				}
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
//view mark end

/*************** OTHER ELEMENTS END *******************/

//End of file mark_ajax.js
//location: ./asstes/ajax/mark_ajax.js