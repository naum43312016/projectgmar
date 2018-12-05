<!DOCTYPE html>
<html>
<head>
	<title>ProjectGmar Excellent Store</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" type="text/css" href="template/css/style.css">
	<link rel="stylesheet" type="text/css" href="template/css/font-awesome.min.css">
	<link rel="stylesheet" href="template/css/bootstrap.css">

   <!--[if IE]>
    <style>
        .f_center {
       text-align: center;    
    }
    </style>
<![endif]-->
</head>
<body>

<!--HEADER START-->

<div class="navbar navbar-inverse" style="margin-bottom: 6px; height: 210px;">


    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/">Excellent</a>
      </div>
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">
          	<li><a href="about">עלינו</a></li>
        	<li><a href="call">צור קשר</a></li>
          	<li><a href="cart">עגלת קניות</a></li>
          	<li><a href="/">ראשי</a></li>
        </ul>
      </div>
    <div class="row" style="text-align:center; margin-top: 30px;">
    	<span id="Name_Company">Excellent Store</span>
	</div>
    </div>
  </div>


<!--HEADER END-->

<div class="container">
                <div class="row">

                <!--CATEGORIES START-->
                    <div class="col-sm-3">
                    
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title" align="center"><a href="cart">
                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>(<?php echo $countItems; ?>)
                                            </a>
                                        </h4>
                                    </div>
                                </div>
                   
                            <h2 align="center">קטלוג</h2>
                            <div class="panel-group">
                                <?php foreach ($categories as $categoryItem): ?>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title" align="center"><a href="/category/<?php echo $categoryItem['id'];?>/page-1">
                                        <?php echo $categoryItem['name'];?>
                                            </a>
                                        </h4>
                                    </div>
                                </div>
                                <?php endforeach;?>
                            </div>
                        
                    </div>
					<!--CATEGORIES END-->

					<!--FORM START-->
				<div class="col-sm-9 padding-right">
						<div class="col-xs-12 col-md-12 col-lg-12 well well-sm">
                            <form action="pay" method="post" class="form-horizontal f_center" align="center" onsubmit="return validate();">
                                 <fieldset>
                     <!-- Address form -->
                                    <h2>כתובת</h2>
                                    <h4 id="validate_form_msg"></h2>
                                        <div class="control-group">
                                            <label class="control-label">שם מלא</label>
                                            <div class="controls">
                                                <input id="full-name" name="full-name" type="text" placeholder="שם מלא">
                                            </div>
                                        </div>
                                        <!-- address-line1 input-->
                                        <div class="control-group">
                                            <label class="control-label">עיר</label>
                                            <div class="controls">
                                                <input id="city" name="city" type="text" placeholder="עיר">
                                            </div>
                                        </div>
                                        <!-- address-line2 input-->
                                        <div class="control-group">
                                            <label class="control-label">כתובת</label>
                                            <div class="controls">
                                                <input id="adress" name="adress" type="text" placeholder="כתובת">
                                            </div>
                                        </div>
                                        <!-- city input-->
                                        <div class="control-group">
                                            <label class="control-label">טלפון</label>
                                            <div class="controls">
                                                <input id="phone" name="phone" type="text" placeholder="מספר טלפון">
                                            </div>
                                        </div>
                                        <!-- region input-->
                                        <div class="control-group">
                                            <label class="control-label">דוא"ל</label>
                                            <div class="controls">
                                                <input id="email" name="email" type="text" placeholder="email">
                                            </div>
                                        </div>
                                        <!-- postal-code input-->
                                        <div class="control-group">
                                            <label class="control-label">מיקוד</label>
                                            <div class="controls">
                                                <input id="postal-code" name="postal-code" type="text" placeholder="מיקוד">
                                                <p class="help-block"></p>
                                            </div>
                                        </div>
                                        <button type="submit" name="pay" class="btn btn-success btn-block">להזמין</button>
                                    </fieldset>
                                </form>
                        						</div>
                        				</div>
                        					<!--FORM END-->
                           				</div>
                            </div>

    		<!--FOOTER START-->
    		<div id="footer">
    			<div class="container">
					<p id="footer_text" align="center">פרויקט גמר של נאום אספוב מכללת אורט רחובות 2017</p>
				</div>
			</div>
					<!--FOOTER END-->


<!--SCRIPTS-->

    <!--JAVASCRIPT VALIDATION FORM-->
    <script>
        function validate(){
            var fullName = document.getElementById("full-name");
            var city = document.getElementById("city");
            var adress = document.getElementById("adress");
            var phone = document.getElementById("phone");
            var email = document.getElementById("email");
            var postalCode = document.getElementById("postal-code");


            if (!fullName.value || !city.value || !adress.value || !phone.value || !email.value || !postalCode.value){
                alert("תמלא את כל הפרטים");
                return false;
            }
            return true;
        }
    </script>


	<script src="template/js/jquery-3.2.1.min.js"></script>
	<script src="template/js/bootstrap.js"></script>
</body>
</html>