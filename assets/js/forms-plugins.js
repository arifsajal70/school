$(document).ready(function(){

	$('[data-plugin="select2"]').select2($(this).attr('data-options'));
	$('[data-plugin="select2"]').select2({ width: '100%' });

});