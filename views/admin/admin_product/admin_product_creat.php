<!DOCTYPE html>
<html>
<head>
	<title>admin product create</title>
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
                     
                                    <h2>מוצר חדש</h2>
                                        <div class="control-group">
                                            <label class="control-label">שמ מוצר</label>
                                            <div class="controls">
                                                <input dir="rtl" id="new_product-name" name="new_product_name" type="text">
                                            </div>
                                        </div>
                                        
                                        <div class="control-group">
                                            <label class="control-label">מחיר</label>
                                            <div class="controls">
                                                <input dir="rtl" id="new_product-price" name="new_product_price" type="text">
                                            </div>
                                        </div>
                                        
                                        <div class="control-group">
                                            <label class="control-label">קטגוריה</label>
                                            <div class="controls">
                                            <select name="new_product_category">
                                            <?php foreach ($categories as $categories_list ): ?>
                                                <option value="<?php echo $categories_list['id']; ?>"><?php echo $categories_list['name']; ?></option>
                                            <?php endforeach; ?>
                                            </select>
                                            </div>
                                        </div>
                                       
                                        <div class="control-group">
                                            <label class="control-label">מותג</label>
                                            <div class="controls">
                                                <input id="brand" name="new_product_brand" type="text"  >
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">כמות במלאי</label>
                                            <div class="controls">
                                                <input id="stock" name="new_product_stock" type="number"  >
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">דרגה</label>
                                            <div class="controls">
                                            <select name="new_product_rank">
                                            <?php for ($i=9; $i >=0 ; $i--):?>
                                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                            <?php endfor; ?>
                                            </select>
                                                <span class="help-block">רמת החשיבות מ0-9 | 0 נמוך 9 גבוה</span>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">סטטוס</label>
                                            <div class="controls">
                                            <select name="new_product_status">
                                                <option value="1">יש במלאי משתמש רואה את המוצר</option>
                                                <option value="0">אין במלאי משתמש לא רואה את המוצר</option>
                                            </select>
                                            </div>
                                        </div>
                                       
                                        <div class="control-group">
                                            <label class="control-label">צבעים</label>
                                            <div class="controls">
                                                <input id="color6" name="new_product_color6" type="text" 
                                                >
                                                <input id="color5" name="new_product_color5" type="text" 
                                                >
                                                <input id="color4" name="new_product_color4" type="text" 
                                                >
                                                <input id="color3" name="new_product_color3" type="text" 
                                                >
                                                <input id="color2" name="new_product_color2" type="text" 
                                                >
                                                <input id="color1" name="new_product_color1" type="text" 
                                                >
                                              <span class="help-block">יש לרשום כל צבע בשורה נפרדת,לא חייבים למלא את כל השורות</span>
                                            </div>
                                        </div>
                                        
                                        <div class="control-group">
                                            <label class="control-label">תיאור</label>
                                            <div class="controls">
                                                <textarea id="description_product" name="new_product_description" dir="rtl" rows="5" cols="80"></textarea>
                                            </div>
                                        </div>


                                        <div class="control-group">
                                            <label class="control-label">תמונה ראשית</label>
                                            <div class="controls" style="align-items: center;">
                                                <input id="image_center" name="new_product_image" type="file" accept="image/*">
                                                <p class="help-block"></p>
                                            </div>
                                        </div>


                                        <div class="control-group">
                                            <label class="control-label">אפשר להוסיף עד7 תמונות CTRL או SHIFT תמונות להוספה כדאי להוסיף כמה תמונות תחזיק </label>
                                            <div class="controls" style="align-items: center;">
                                                <input id="image_center" name="new_product_multiple_images[]" type="file" accept="image/*" multiple 
                                                >
                                                <p class="help-block"></p>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">סרטון של מוצר</label>
                                            <div class="controls" style="align-items: center;">
                                                <input id="image_center" name="new_product_video" type="file">
                                                <p class="help-block">להוסיף סרטון</p>
                                            </div>
                                        </div>


                                         <div class="btn-group">
                                            <button type="submit" name="new_product_add_btn" class="btn btn-success" style="width: 200px; margin-top: 2px;">להוסיף מוצר</button>
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