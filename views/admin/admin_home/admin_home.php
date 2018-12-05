<!DOCTYPE html>
<html>
<head>
	<title>admin</title>
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
  #image_center {
  text-align: center;
  margin: auto;
}
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
              <!--check if javascript off-->
              <noscript><span style="color: red;">לעבודה תקינה תפעיל JAVASCRIPT</span></noscript>
  <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title" align="center"><a href="/adminProductList">
                                        מוצרים
                                            </a>
                                        </h4>
                                    </div>
                                </div>

                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title" align="center"><a href="/adminOrderList">
                                        הזמנות
                                            </a>
                                        </h4>
                                    </div>
                                </div>

                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title" align="center"><a href="/adminCategoryList">
                                        קטגוריות
                                            </a>
                                        </h4>
                                    </div>
                                </div>

                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title" align="center"><a href="/adminStatistics">
                                        סטטיסטיקה של מוצרים
                                            </a>
                                        </h4>
                                    </div>
                                </div>
								
								<div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title" align="center"><a href="/adminEnterStatistics">
                                        סטטיסטיה של כניסות
                                            </a>
                                        </h4>
                                    </div>
                                </div>

                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title" align="center"><a href="/adminStock">
                                        מוצרים שעומדים להיגמר
                                            </a>
                                        </h4>
                                    </div>
                                </div>

                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title" align="center"><a href="/siteUsers">
                                        משתמשים
                                            </a>
                                        </h4>
                                    </div>
                                </div>

                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title" align="center"><a href="/adminUsers">
                                        מנהלים
                                            </a>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
  </div>


<!--SCRIPTS-->

    
	<script src="../../../template/js/jquery-3.2.1.min.js"></script>
	<script src="../../../template/js/bootstrap.js"></script>

</body>
</html>