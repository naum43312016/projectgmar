<!DOCTYPE html>
<html>
<head>
	<title>admin order list</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" type="text/css" href="../../../template/css/style.css">
	<link rel="stylesheet" type="text/css" href="../../../template/css/font-awesome.min.css">
	<link rel="stylesheet" href="../../../template/css/bootstrap.css">
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
                <div class="col-sm-12 col-md-12 ">
            <h1 class="text-center">הזמנות</h1>
            <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>ערוך</th>
                      <th>תאריך</th>
                      <th>כתובת</th>
                      <th>עיר</th>
                      <th>מיקוד</th>
                      <th>שם לקוח</th>
                      <th>טלפון</th>
                      <th>email</th>


                      <th>סטטוס</th>
                      <th>מחיר מלא</th>
                      <th>מוצרים</th>
                      <th>מספר הזמנה</th>
                    </tr>
                  </thead>
                  <?php foreach ($order_admin as $order_data): ?>
                    <?php 
                    $products_of_order = explode("|", $order_data['products']); 

                    $products_ids = explode(",", $products_of_order[0]);
                    $products_camut = explode(",", $products_of_order[1]);
                    $products_colors = explode(",", $products_of_order[2]);
                    ?>
                  <tbody>
                    <tr>
                      <td><a href="/order/edit/<?php echo $order_data['id']; ?>"><i style="float: left; font-size: 19px;margin-right: 2px;" class="fa fa-eye" aria-hidden="true"></i></a></td>
                      <td><?php echo $order_data['date_of_order']; ?></td>
                      <td><?php echo $order_data['adress']; ?></td>
                      <td><?php echo $order_data['town']; ?></td>
                      <td><?php echo $order_data['mikud']; ?></td>
                      <td><?php echo $order_data['user_name']; ?></td>
                      <td><?php echo $order_data['user_phone']; ?></td>
                      <td><?php echo $order_data['email']; ?></td>


                      <td><?php echo $order_data['status']; ?></td>
                      <td><?php echo $order_data['totalPrice']; ?></td>


                      <td dir="rtl">
                      
                     <?php 
                      $lenght = count($products_ids);
                      for ($i=0; $i <$lenght ; $i++) { 
                        echo 'מספר מוצר_' . $products_ids[$i] . '-' . 'כמות_' . $products_camut[$i] . '-' . 'צבעים' . '-'. $products_colors[$i] .'|';
                      }
                        
                     ?>
                     
                        
                      </td>
                      <td><?php echo $order_data['num_order']; ?></td>
                    </tr>
                  </tbody>
                  <?php endforeach; ?>
                </table>
        </div>
 </div>
</div>


<!--SCRIPTS-->
	<script src="../../../template/js/jquery-3.2.1.min.js"></script>
	<script src="../../../template/js/bootstrap.js"></script>
</body>
</html>