$(document).ready(function(){
	$("#chapter_success").hide();
	$("#chapter_error").hide();
	$("#new_chapter_creation").hide();
});

$("#create_chapter").on("click", function(){
	$("#new_chapter_creation").slideDown(100);
});

/*Create chapter*/
function chcek_all()
{
	var chap_title = $("#chapter_title").val();
	var chap_sl = $("#sl_no").val();
	var chap_desc = $("#chater_desc").val();

	if(chap_title == "" || chap_sl == "" || chap_desc == "")
	{
		$("#chapter_error").html("Error! All fields are mentatory");
		$("#chapter_error").slideDown();
		$(window).scrollTop(10);
		return false;
	}
	else
		return true;
}
/*Create chapter*/

/*Edit chapter name*/
function edit_chapter_name(col_id)
{
	$("#chapter_handel_"+col_id).hide();
	$("#edit_chapter_name_"+col_id).show();
	return false;
}

function cancel(col_id)
{
	$("#chapter_handel_"+col_id).show();
	$("#edit_chapter_name_"+col_id).hide();
	return false;
}

function submit_chapter(col_id, chapter_id)
{
	$("#chapter_success").hide();
	var new_chapter_name = $("#edit_chapter_"+col_id).val();

	$.ajax({
		url: "chapter-edit-name",
		type: "POST",
		dataType: "JOSN",
		data: {new_name:new_chapter_name,chapter_id:chapter_id},
		headers: {
	      'X_CSRF_TOKEN': $('meta[name="csrf-token"]').attr('content')
	    },
		statusCode: {
			200: function(){
				$("#show_chapter_name_"+col_id).html(new_chapter_name);
				$("#success_text").html('Chapter name successfully change. New chapter name '+new_chapter_name);
				$("#chapter_success").slideDown();
				cancel(col_id);
			}
		}
	});
}

function chpater_sl_no(chapter_id, col_id)
{
	$("#chapter_success").hide();
	var sl_no = $("#chapter_sl_no_"+col_id).val();

	$.ajax({
		url: "chapter-edit-slno",
		type: "POST",
		dataType: "JOSN",
		data: {chapter_id:chapter_id,sl_no:sl_no},
		headers: {
	      'X_CSRF_TOKEN': $('meta[name="csrf-token"]').attr('content')
	    },
		statusCode: {
			200: function(){
				$("#success_text").html('Serial number change successfully.');
				$("#chapter_success").slideDown();
			}
		}
	});
	return false;
}

function edit_chapter(col_id,chapter_id)
{
	$("#chapter_success").hide();
	var chap_def = $("#chapter_defination_"+col_id).val();

	$.ajax({
		url: "chapter-edit-defination",
		type: "POST",
		dataType: "JOSN",
		data: {chapter_id:chapter_id,chap_def:chap_def},
		headers: {
	      'X_CSRF_TOKEN': $('meta[name="csrf-token"]').attr('content')
	    },
		statusCode: {
			200: function(){
				$("#success_text").html('Chapter details edited successfully.');
				$("#chapter_success").slideDown();
				$(window).scrollTop(10);
			}
		}
	});
	return false;
}


/* /Edit chapter name*/
