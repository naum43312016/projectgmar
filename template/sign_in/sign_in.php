<?php if (!isset($_SESSION['user_name']) || $_SESSION['user_name'] == ''): ?>
<div id="sign_in" class="form-signin">
<h2 style="margin-bottom: 10px;text-align: center;">כניסה/הרשמה</h2>
<input class="required" style="width: 100%;" type="text" name="login" id="login" placeholder="שם משתמש">
<input class="required" style="width: 100%; margin-top: 2px;" type="password" name="password" id="password" placeholder="סיסמה">
<input class="btn btn-lg btn-success btn-block" style="margin-top: 4px;" type="button" name="login_btn" id="login_btn" value="כניסה">
<input class="btn btn-lg btn-primary btn-block" style="margin-top: 4px;" type="button" name="reg_btn" id="reg_btn" value="הרשמה">
<input class="btn btn-lg btn-danger btn-block" style="margin-top: 4px;" type="button" name="forgot_btn" id="forgot_btn" value="שכחתי סיסמה">
</div>
<?php endif ?>
<div style="text-align: center;font-size: 20px;">
<?php if (isset($_SESSION['user_name']) && $_SESSION['user_name'] != ''): ?>
<a href="/user/<?php echo $_SESSION['user_id']; ?>" target="_blank"><?php echo $_SESSION['user_name'];?></a><i> שלום</i>
<form action="#" method="post">
<button name="exit_user">יציאה</button>
</form>
<?php endif ?>
</div>

<div id="user_js" style="text-align: center;font-size: 20px;">
<a id="user_link_js" href="" target="_blank"></a><i> שלום</i>
<form action="#" method="post">
<button name="exit_user">יציאה</button>
</form>
</div>

<!--modal windwo-->
<div id="regModal" class="modal fade">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
<h4 class="modal-title">הרשמה לאתר</h4>
</div>
<div class="modal-body">
<input class="required" style="width: 100%;" type="text" name="login_reg" id="login_reg" placeholder="שם משתמש">
<input class="required" style="width: 100%;" type="text" name="email_reg" id="email_reg" placeholder="email">
<input class="required" style="width: 100%;" type="text" name="password_reg" id="password_reg" placeholder="סיסמה">
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">לסגור</button>
<button type="button" id="reg_user" class="btn btn-primary">הרשמה</button>
</div>
</div>
</div>
</div>
<div id="forgetModal" class="modal fade">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
<h4 class="modal-title">קבלת סיסמה חדשה</h4>
</div>
<div class="modal-body">
<input class="required" style="width: 100%;" type="text" name="email_forget" id="email_forget" placeholder="email">
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">לסגור</button>
<button type="button" id="password_get" class="btn btn-primary">לקבל סיסמה</button>
</div>
</div>
</div>
</div>