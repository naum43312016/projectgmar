<!DOCTYPE html>
<html>
<head>
    <title>admin user add</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="../../../template/css/style.css">
    <link rel="stylesheet" type="text/css" href="../../../template/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../../template/css/bootstrap.css">

  <!--[if IE]>
    <style>
        .f_center {
       text-align: center;    
    }
    </style>
<![endif]-->

<style>
  input{text-align: right;}
</style>
</head>
<body>

    <div class="navbar navbar-inverse" style="margin-bottom: 6px; height: 210px;">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Excellent</a>
      </div>
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">
            <li><a href="/adminExit">יציאה</a></li>
            <li><a href="/adminCategoryList">קטגוריות</a></li>
            <li><a href="/adminOrderList">הזמנות</a></li>
            <li><a href="/adminProductList">מוצרים</a></li>
            <li><a href="/adminHome">ראשי</a></li>
        </ul>
      </div>
    <div class="row" style="text-align:center; margin-top: 30px;">
        <span id="Name_Company">Excellent Store</span>
    </div>
    </div>
  </div>

  <div class="container-fluid">
                <div class="row">
                <div class="col-xs-12 col-md-12 col-lg-12 well well-sm">
                <form action="#" method="post" class="form-horizontal f_center" align="center">
                   <fieldset>
                      <h2>מנהל חדש</h2>
                          <div class="control-group">
                              <label class="control-label">שם משתמש</label>
                              <div class="controls">
                                  <input id="login_admin" name="login_admin" type="text">
                              </div>
                              <label class="control-label">סיסמה</label>
                              <div class="controls">
                                  <input id="password_admin" name="password_admin" type="text">
                              </div>
                          </div>
                              <button name="add-admin" class="btn btn-primary btn-block" style="margin-top: 10px;">ליצור מנהל חדש</button>
                      </fieldset>
                  </form>
              </div>
 </div>
</div>


<!--SCRIPTS-->
    <script src="../../../template/js/jquery-3.2.1.min.js"></script>
    <script src="../../../template/js/bootstrap.js"></script>
</body>
</html>