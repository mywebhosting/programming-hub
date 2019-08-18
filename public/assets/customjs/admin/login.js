$(document).ready(function(){
   $("#show_error").hide();
});

$(function(){
   var login_validate = {
      'email_id': function(){
         $("#show_error").slideUp();
         var id = $("#email").val();
         var alpha = /^[a-zA-Z0-9._]+\@[a-zA-Z]+\.[a-zA-Z]+$/;
         if($.trim(id) == '')
         {
            login_validate.error = true;
            $("#show_error").html("User id or Email id required");
            $("#show_error").slideDown();
         }
         else if(!alpha.test($.trim(id)))
         {
            login_validate.error = true;
            $("#show_error").html("Email id invalid");
            $("#show_error").slideDown();
         }
         else
         {
            $("#show_error").slideUp();
            $("#show_error").html("");
         }
      },
      'password': function(){
         $("#show_error").slideUp();
         var pwd = $("#pwd").val();
         if(pwd == '')
         {
            login_validate.error = true;
            $("#show_error").html("Password Invalid");
            $("#show_error").slideDown();
         }
         else
         {
            var chng_pwd = "Developer"+pwd+"Developer2019";
            var hash = ($.MD5(chng_pwd));
            $("#pwd").val(hash);
         }
      },
      'senddetails': function(){
         if(!login_validate.error)
         {
            var form_data = $("#login_form").serialize();
            $.ajax({
               url: "admin_login_ajax",
               type: "POST",
               dataType: "JSON",
               data: form_data,
               headers:{
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               },
               success:function(result){
                  if(result != 1)
                  {
                     login_validate.error = true;
                     $("#show_error").html(result);
                     $("#show_error").slideDown();
                  }
                  else
                  {
                     $("#login_loader").show();
                     $("#login_bttn").hide();
                     // var url = "<?php url('super-admin/dashboard') ?>";
                     window.location.replace("super-admin/dashboard");
                  }
               },
            });
         }
      }
   }

   $("#login_bttn").click(function(){
      login_validate.error = false;
      login_validate.email_id();
      if(login_validate.error)
         return false;
      login_validate.password();
      if(login_validate.error)
         return false;
      login_validate.senddetails();
   });
});