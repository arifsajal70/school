

function hidetable(table)
{
	if($(table).is(":visible"))
    {
    	$(table).slideUp(150);
    }
}

function showtable(table)
{
	if(!$(table).is(":visible"))
    {
    	$(table).slideDown(150);
    }
    else if($(table).is(":visible"))
    {
    	hidetable(table);
    	$(table).slideDown(150);
    }
}

function hidebutton(button)
{
	if($(button).is(":visible"))
    {
    	$(button).hide();
    }
}

function showbutton(button)
{
	if(!$(button).is(":visible"))
    {
    	$(button).show();
    }
}

function showpreloader(element)
{
	$(element).append('<div class="preloader"></div>');
}

function hidepreloader()
{
	$(".preloader").fadeOut(function(){
        $("div").remove('.preloader');
    });
}

function print(elem)
{
	var mywindow = window.open('', 'PRINT');

    mywindow.document.write('<html><head><title>' + document.title  + '</title>');
    mywindow.document.write('</head><body>');
    mywindow.document.write('<h1>' + document.title  + '</h1>');
    mywindow.document.write(document.getElementById(elem).innerHTML);
    mywindow.document.write('</body></html>');

    mywindow.document.close(); // necessary for IE >= 10
    mywindow.focus(); // necessary for IE >= 10*/

    mywindow.print();
    mywindow.close();

    return true;
}



//getting section for top select section
function get_section(clsid,classes)
{   
    window.clsid = clsid;
    $("#class_label").html(classes);
    hidetable('.student_table');
    showpreloader('body');
    jQuery.ajax({
        type: "GET",
        url: './section/get_section_by_id/'+clsid+'/link',
        success:function(data)
        {
            $("#section_select").html(data);
        },
        complete:function()
        {
            hidepreloader();
        }
    });
}
//Getting Section End