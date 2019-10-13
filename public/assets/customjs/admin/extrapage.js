$(document).ready(function(){
	// $(".title_error").hide();
	$("#success_alet").hide();
	$("#error_alert").hide();
});

// $(function() {
	var frmvalidation = {
		'frm_name': function() {
			var name = $('#page_title').val();
			if($.trim(name) == '')
			{
				frmvalidation.error = true;
				$('.title_error').html("Page title mentetory");
			}
		},
		'check_name': function() {
			if(!frmvalidation.error)
			{
				var name = $('#page_title').val();
				frmvalidation.error = true;
				$.ajax({                        
                    type: "POST",
                    url: "check_extra_page_name",
                    data: {page_name: name},
                    headers: {
				      'X_CSRF_TOKEN': $('meta[name="csrf-token"]').attr('content')
				    },
                    success: function (data) {
                        if (data == '1') {
                        	$('.title_error').html("Page title already exist");
                        	frmvalidation.error = true;
                        }
                        else
                        {
                        	window.location.href="/super-admin/management/website-extra-page/"+name;
                        }
                    }
                });
			}
		},
		'show_image_upload': function(input){
			if (input.files && input.files[0]) {
				var reader = new FileReader();

			reader.onload = function(e) {
				$('#logo_prev').attr('src', e.target.result);
			}

			reader.readAsDataURL(input.files[0]);
			}
		},
	}

	$('#page_title_form').submit(function(){
		frmvalidation.error = false;
		frmvalidation.frm_name();
		frmvalidation.check_name();
		if(!frmvalidation.error)
			return true;
		return false;
	});
// });

function show_logo(name)
{
	frmvalidation.show_image_upload(name);
}