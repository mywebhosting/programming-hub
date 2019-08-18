function show_menu()
{
	$('.resp_menu').slideDown(500);
	$('.menu_show').hide();
	$('.menu_close').show();
	return false;
}

function hide_menu()
{
	$('.resp_menu').slideUp(500);
	$('.menu_close').hide();
	$('.menu_show').show();
	return false;
}