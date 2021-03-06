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
          	<li class="active"><a href="cart">עגלת קניות</a></li>
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
                        
                        <?php include 'template/sign_in/sign_in.php';?>
                    </div>
					<!--CATEGORIES END-->

					<!--TABLE START-->
				<div class="col-sm-9">
					
					
						<div class="col-xs-12 col-md-12 col-lg-12 well well-sm">
							<table class="table table-bordered">
							    <thead>
							      <tr>
							        <th>'מחיר ליח</th>
							        <th>כמות</th>
							        <th>שם המוצר</th>
                      <th>למחוק</th>
							      </tr>
							    </thead>
							    <tbody>
                  <?php foreach ($products as $product):?>
							      <tr>
							        <td><?php echo $product['price']; ?></td>
							        <td><?php echo $productsInCart[$product['id']]; ?></td>
							        <td><a href="/product/<?php echo $product['id']; ?>" target="_blank"><?php echo $product['name']; ?></a></td>
                      <td>

                      <form action="#" method="post">
                          <button name="submit">
                            <input type="hidden" name="deleteProduct" value="<?php echo $product['id']; ?>">
                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                          </button>
                      </form>
                      </td>
							      </tr>
                  <?php endforeach;?>
                  <tr>
                  <td colspan="5"class="text-right"><strong>מחיר סופי:</strong> <i>&#8362;<?php echo $totalPrice;?></i></td>
                  </tr>
							    </tbody>
							  </table>
							<a href="/adress" class="btn btn-success btn-block">להזמין</a>
						</div>


				</div>
					<!--TABLE END-->
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
   <!--LOGIN SCRIPT-->
  <script src="template/js/sign_in.js"></script>

</body>
</html>