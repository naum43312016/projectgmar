<!DOCTYPE html>
<html>
<head>
	<title>PayPage</title>
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
                            
                <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <address>
                        <strong><?php echo $city;?></strong>
                        <br>
                        <?php echo $adress;?>
                        <br>
                        
                       
                    </address>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                    <p>
                        <em><?php echo date("j.n.Y"); ?></em>
                    </p>
                </div>
                </div>



                <div class="row">
                    <div class="text-center">
                        <h1>הזמנה</h1>
                    </div>
                    </span>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                
                                
                                <th class="text-center">מחיר</th>
                                <th>#</th>
                                <th>מוצר</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($products as $product):?>
                            <tr>
                                <td class="col-md-2 text-center"><?php echo $product['price']; ?>&#8362;</td>
                                <td class="col-md-1"><?php echo $cart_products[$product['id']]; ?></td>
                                <td class="col-md-9"><em><?php echo $product['name']; ?></em></h4></td>
                            </tr>
                        <?php endforeach;?>
                            
                            
                            
                            <tr>
                               
                                <td>   </td>
                                
                                <td ></td>
                                <td class="text-right"><h4><strong>מחיר סופי: <span class="text-danger"><?php echo $totalPrice?></span></strong></h4></td>
                            </tr>
                        </tbody>
                    </table>
                                <?php 
                                    $mysite = $_SERVER['HTTP_HOST'];
                                 ?>

                                <!--SANDBOX PAYPAL BUTTON -->
                                    <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
                                    <input type="hidden" name="cmd" value="_xclick">
                                    <input type="hidden" name="business" value="naum4331-facilitator@rambler.ru">
                                    <input type="hidden" name="lc" value="he_IL">
                                    <input type="hidden" name="item_name" value="<?php echo $num_order?>">
                                    <input type="hidden" name="amount" value="<?php echo $totalPrice?>">
                                    <input type="hidden" name="currency_code" value="ILS">
                                    <input type="hidden" name="return" value="http://<?php echo $mysite; ?>/success/<?php echo $num_order?>">
                                    <input type="hidden" name="cancel_return" value="http://<?php echo $mysite; ?>/cancel">
                                    <input type="hidden" name="hosted_button_id" value="VV2NRWXRX3FCL">
                                    <input type="submit" name="submit" class="btn btn-info btn-lg btn-block"
                                    value="לתשלום בפייפל">
                                    </form>
                                    </div>
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
	<script src="template/js/jquery-3.2.1.min.js"></script>
	<script src="template/js/bootstrap.js"></script>
</body>
</html>