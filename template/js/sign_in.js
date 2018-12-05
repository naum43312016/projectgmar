 $(document).ready(function (){
      $('#user_js').hide();
      $("#login_btn").click(function (){
        var login = $("#login").val();
        var password = $("#password").val();
        $.ajax({
          url: '/loginCheck',
          type: 'POST',
          cashe: false,
          data: {'login' :login, 'password' :password},
          dataType: 'html',
          success: function(data){
            if (data == "error_login") {
              alert("שמ משתמש או סיסמה לא נכונים");   
            }else{
              arr = data.split(',')
              $('#user_link_js').html(arr[0]);
              $('#user_link_js').attr("href", "/user/" + arr[1]);
              $('#user_js').show();
              $('#sign_in').hide();
            }
          }
        });
      });
      $("#reg_btn").click(function (){
        $("#regModal").modal('show');
      });
      $("#reg_user").click(function (){
        $("#regModal").modal('hide');
        var login = $("#login_reg").val();
        var password = $("#password_reg").val();
        var email = $("#email_reg").val();
        $.ajax({
          url: '/registerCheck',
          type: 'POST',
          cashe: false,
          data: {'login' :login, 'password' :password, 'email' :email},
          dataType: 'html',
          success: function(data){
            if (data == "size_data") {
              alert("שמ משתמש סיסמה צריכים להיות 3 עד 12 סימנים"); 
            }else if (data == "busy") {
              alert("שם משתמש תפוס");
            }else if (data == "error") {
              alert("משהו לא בסדר תנסה שוב");
            }else if (data == "email_error") {
              alert("EMAIL לא תקין");
            }else if (data == "email_busy") {
              alert("EMAIL כבר רשום");
            }else{
              arr = data.split(',')
              $('#user_link_js').html(arr[0]);
              $('#user_link_js').attr("href", "/user/" + arr[1]);
              $('#user_js').show();
              $('#sign_in').hide();
            }
          }
        });
      });
      $("#forgot_btn").click(function (){
        $("#forgetModal").modal('show');
      });

      $("#password_get").click(function (){
        $("#forgetModal").modal('hide');
        var email = $("#email_forget").val();
        $.ajax({
          url: '/getNewPassword',
          type: 'POST',
          cashe: false,
          data: {'email' :email},
          dataType: 'html',
          success: function(data){
            if (data == "OK") {
              alert("תקבל סיסמה במייל"); 
            }else{
              alert("אין משתמש כזה");
            }
          }
        });
      });

    });