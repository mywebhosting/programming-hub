$(document).ready(function(){
	// $(".title_error").hide();
	$("#success_alet").hide();
	$("#error_alert").hide();
});

function add_language()
{
	var title = $("#language_title").val();
	if(title == "")
	{
		$(".title_error").html('Language title reruired');
		// $(".title_error").show();
		$("#language_title").focus();
		return false;
	}
	return true;
}

function deactive(rowId, languageId)
{
	$("#success_alet").hide();
	$("#error_alert").hide();

	$("#change_loader_"+rowId).show();
	$("#success_alet").scrollTop();
	$.ajax({
    	url: "language_status",
       	type: "POST",
       	dataType: "JSON",
       	data: {languageid:languageId,action:"deactive"},
       	headers:{
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       	},
       	success:function(result){
        	if(result == 1)
          	{
            	$("#success_msg").html('Successfull deactive.');
            	$("#success_alert").html('Please wait the page will refresh.')
				$("#success_alet").slideDown();
				// $("#change_loader_"+rowId).hide();

				setInterval(function() {
              		window.location.reload();
            	}, 2000); 
          	}
       	},
    });
	return false;
}

function active(rowId, languageId)
{
	$("#success_alet").hide();
	$("#error_alert").hide();

	$("#change_loader_"+rowId).show();
	$("#success_alet").scrollTop();
	$.ajax({
    	  url: "language_status",
       	type: "POST",
       	dataType: "JSON",
       	data: {languageid:languageId,action:"active"},
       	headers:{
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       	},
       	success:function(result){
        	if(result == 1)
          	{
            	$("#success_msg").html('Successfull active.');
            	$("#success_alert").html('Please wait the page will refresh.')
				      $("#success_alet").slideDown();
				// $("#change_loader_"+rowId).hide();

				setInterval(function() {
              		window.location.reload();
            	}, 2000); 
          	}
       	},
    });
	return false;
}

function delete_lang()
{
	alert("This button is under construction")
}

function chg_slno(row_id, lang_id, slno)
{
  $("#success_alet").hide();
  $("#error_alert").hide();

  $("#success_alet").scrollTop();
  $("#change_slno_"+row_id).show();
  $.ajax({
    url: "language_sl_no",
    type: "POST",
    dataType: "JSON",
    data: {language_id:lang_id, sl_no:slno},
    headers: {
      'X_CSRF_TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    statusCode: {
      422: function()
      { 
        $("#error_msg").html('This serial number is already exist. Please check again Id ');
        $("#error_alet").html(row_id)
        $("#error_alert").slideDown();
        $("#change_slno_"+row_id).hide();
      },
      200: function()
      {
        $("#success_msg").html('Serial number change.');
        $("#success_alert").html('Success');
        $("#success_alet").slideDown();
        $("#change_slno_"+row_id).hide();
      }
    }
  });
  return false;
}