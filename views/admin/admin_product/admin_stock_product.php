<!DOCTYPE html>
<html>
<head>
	<title>admin Excellent Store</title>
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
                <div class="col-sm-6 col-md-4 col-md-offset-4">
            <h1 class="text-center">מוצרים שעומדים להיגמר</h1>
            <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>סטטוס</th>
                      <th>כמות במלאי</th>
                      <th>שם מוצר</th>
                      <th>מספר מוצר</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach ($products as $product): ?>
                    <tr>
                      <td><?php echo $product['status']; ?></td>
                      <td><?php echo $product['stock']; ?></td>
                      <td><a href="/product/<?php echo $product['id']; ?>" target="_blank"><?php echo $product['name']; ?></a></td>
                      <td><?php echo $product['id']; ?></td>
                    </tr>
                  <?php endforeach; ?>
                  </tbody>
                </table>
        </div>
 </div>
</div>


<!--SCRIPTS-->
	<script src="../../../template/js/jquery-3.2.1.min.js"></script>
	<script src="../../../template/js/bootstrap.js"></script>
</body>
</html>