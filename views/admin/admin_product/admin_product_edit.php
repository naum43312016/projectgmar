<!DOCTYPE html>
<html>
<head>
	<title>admin product edit</title>
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

  <div class="container-fluid">
                <div class="row">
                <div class="col-xs-12 col-md-12 col-lg-12 well well-sm">
                <div class="text-center">
                    <?php if (isset($errors) && is_array($errors)): ?>
                                    <ul class="list-group">
                                        <?php foreach ($errors as $error): ?>
                                            <li class="list-group-item" style="color: red;"> - <?php echo $error; ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                        </div>
                            <form action="#" method="post" enctype="multipart/form-data" class="form-horizontal f_center" align="center">
                                 <fieldset>
                     <!-- Address form -->
                                    <h2>מוצר מספר <?php echo $product['id']; ?></h2>
                                        <div class="control-group">
                                            <label class="control-label">שמ מוצר</label>
                                            <div class="controls">
                                                <input dir="rtl" id="product-name" name="product_name" type="text" value="<?php echo $product['name']; ?>">
                                            </div>
                                        </div>
                                        <!-- address-line1 input-->
                                        <div class="control-group">
                                            <label class="control-label">מחיר</label>
                                            <div class="controls">
                                                <input dir="rtl" id="product-price" name="product_price" type="text" value="<?php echo $product['price']; ?>">
                                            </div>
                                        </div>
                                        <!-- address-line2 input-->
                                        <div class="control-group">
                                            <label class="control-label">קטגוריה</label>
                                            <div class="controls">
                                            <select name="product_category">
                                            <?php foreach ($categories as $categories_list ): ?>
                                                <option <?php if ($categories_list['id'] == $product['category_id']) {
                                                    echo "selected";
                                                } ?> value="<?php echo $categories_list['id']; ?>"><?php echo $categories_list['name']; ?></option>
                                            <?php endforeach; ?>
                                            </select>
                                            </div>
                                        </div>
                                        <!-- city input-->
                                        <div class="control-group">
                                            <label class="control-label">מותג</label>
                                            <div class="controls">
                                                <input id="brand" name="brand" type="text" value="<?php echo $product['brand']; ?>">
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">כמות במלאי</label>
                                            <div class="controls">
                                                <input id="stock" name="product_stock" type="number" value="<?php echo $product['stock']; ?>">
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">דרגה</label>
                                            <div class="controls">
                                            <select name="product_rank">
                                            <?php for ($i=9; $i >=0 ; $i--):?>
                                                <option <?php if ($i == $product['rank']) {
                                                    echo "selected";
                                                } ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                            <?php endfor; ?>
                                            </select>
                                                <span class="help-block">רמת החשיבות מ0-9 | 0 נמוך 9 גבוה</span>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">סטטוס</label>
                                            <div class="controls">
                                            <select name="product_status">
                                                <option <?php if ($product['status'] == 1) {
                                                    echo "selected";
                                                } ?> value="1">יש במלאי משתמש רואה את המוצר</option>
                                                <option <?php if ($product['status'] == 0) {
                                                    echo "selected";
                                                } ?> value="0">אין במלאי משתמש לא רואה את המוצר</option>
                                            </select>
                                            </div>
                                        </div>
                                        <!-- region input-->
                                        <div class="control-group">
                                            <label class="control-label">צבעים</label>
                                            <div class="controls">
                                                <input id="color6" name="product_color6" type="text" value="<?php echo $product['color_name5']; ?>" 
                                                >
                                                <input id="color5" name="product_color5" type="text" value="<?php echo $product['color_name4']; ?>" 
                                                >
                                                <input id="color4" name="product_color4" type="text" value="<?php echo $product['color_name3']; ?>" 
                                                >
                                                <input id="color3" name="product_color3" type="text" value="<?php echo $product['color_name2']; ?>" 
                                                >
                                                <input id="color2" name="product_color2" type="text" value="<?php echo $product['color_name1']; ?>" 
                                                >
                                                <input id="color1" name="product_color1" type="text" value="<?php echo $product['color_name']; ?>" 
                                                >
                                              <span class="help-block">יש לרשום כל צבע בשורה נפרדת,לא חייבים למלא את כל השורות</span>
                                            </div>
                                        </div>
                                        <!-- postal-code input-->
                                        <div class="control-group">
                                            <label class="control-label">תיאור</label>
                                            <div class="controls">
                                               
                                                <textarea name="product_description" dir="rtl" rows="4" cols="50" ><?php echo $product['description']; ?></textarea>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">החלפת תמונה ראשית</label>
                                            <div class="controls" style="align-items: center;">
                                                <input id="image_center" name="product_image" type="file" accept="image/*">
                                                <p class="help-block"></p>
                                            </div>
                                        </div>

                                        <!--DELETE PHOTOS START-->
                                            <label class="control-label">תבחר תמונות למחיקה</label>
                                            <ul class="well">
                                            <?php for ($i=0; $i <= 6; $i++): ?>
                                                <?php if(!empty($product['image' . $i])): ?>
                                                    <img id="image<?php echo $i;?>" name="image<?php echo $i;?>" onclick="img_<?php echo $i;?>_Function()" src="<?php echo $product['image' . $i]; ?>" height="222" width="222">
                                                    <input type="hidden" id="img_<?php echo $i;?>" name="img_<?php echo $i;?>" value="">
                                                <?php endif ?>
                                            <?php endfor ?>
                                            </ul>

                                        <script>
                                        <?php for ($i=0; $i <= 6; $i++): ?>
                                        function img_<?php echo $i;?>_Function(){
                                            var image<?php echo $i;?> = document.getElementById('image<?php echo $i;?>');
                                            var img_<?php echo $i;?> = document.getElementById('img_<?php echo $i;?>');
                                            if ($(img_<?php echo $i;?>).attr("value") == '1') {
                                                        $(image<?php echo $i;?>).css({'border' : 'none'});
                                                        $(img_<?php echo $i;?>).attr("value","0");
                                                    }else {
                                                        $(image<?php echo $i;?>).css({'border' : '1px red solid'});
                                                    $(img_<?php echo $i;?>).attr("value","1");
                                                    }
                                        }
                                        <?php endfor ?>
                                        </script>
                                        <!--DELETE PHOTOS END-->


                                        <div class="control-group">
                                            <label class="control-label">CTRL או SHIFT תמונות להוספה כדאי להוסיף כמה תמונות תחזיק </label>
                                            <div class="controls" style="align-items: center;">
                                                <input id="image_center" name="product_multiple_images[]" type="file" accept="image/*" multiple 
                                                >
                                                <p class="help-block"></p>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">החלפת סרטון</label>
                                            <div class="controls" style="align-items: center;">
                                                <input id="image_center" name="product_video" type="file">
                                                <p class="help-block"></p>
                                            </div>
                                        </div>


                                         <div class="btn-group">
                                            <button type="submit" name="delete_btn" class="btn btn-danger" style="width: 200px;margin-right: 5px; margin-top: 2px;">למחוק</button>
                                            <button type="submit" name="edit_btn" class="btn btn-success" style="width: 200px; margin-top: 2px;">לערוך</button>
                                         </div>
                                         
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