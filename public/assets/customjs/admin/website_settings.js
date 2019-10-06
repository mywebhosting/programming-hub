$(document).ready(function ()
{
	$(".message").find("div").hide();
	$("#basic_settings_loader").hide();
});

function show_logo(name)
{
	readURL(name);
}

function readURL(input) {
	if (input.files && input.files[0]) {
		var reader = new FileReader();

	reader.onload = function(e) {
		$('#logo_prev').attr('src', e.target.result);
	}

	reader.readAsDataURL(input.files[0]);
	}
}

function extra_email()
{
	let templact = '<div class="col-lg-11"><input id="conct_email" name="conct_email[]" class="form-control" placeholder="Contact Email"><p class="help-block"></p></div>';
	$("#cont_email_ext").append(templact);
	return false;
}

function extra_phone()
{
	let templact = '<div class="col-lg-11"><input id="conct_phno" name="conct_phno[]" class="form-control"  placeholder="Contact phone no."><p class="help-block"></p></div>';
	$("#cont_phone_extra").append(templact);
	return false;
}