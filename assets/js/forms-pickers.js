/* =================================================================
		Clock Picker
		================================================================= */
		
		$('.clockpicker').clockpicker({
			placement: 'top',
			align: 'left',
			autoclose: true,
			'default': 'now'
		});

		$('.mydatepicker, #datepicker').datepicker();

		$('.mydatepicker-autoclose, #datepicker-autoclose').datepicker({
			autoclose: true,
			todayHighlight: true,
		});

		$('#datepicker-multiple').datepicker({
			format: "mm/dd/yyyy",
			clearBtn: true,
			multidate: true,
			multidateSeparator: ", "
		});

		$('#date-range').datepicker({
			toggleActive: true
		});

		$('#datepicker-inline').datepicker({
			todayHighlight: true
		});