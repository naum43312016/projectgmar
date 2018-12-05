<!DOCTYPE html>
<html>
<head>
	<title>Product Page</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="/../template/css/style.css">
	<link rel="stylesheet" type="text/css" href="/../template/css/font-awesome.min.css">
	<link rel="stylesheet" href="/../template/css/bootstrap.css">
  <style>#message {display:none;}</style>
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
          	<li><a href="/about">עלינו</a></li>
        	<li><a href="/call">צור קשר</a></li>
          	<li><a href="/cart">עגלת קניות</a></li>
          	<li><a href="/">ראשי</a></li>
        </ul>
      </div>
    <div class="row" style="text-align:center; margin-top: 30px;">
    	<span id="Name_Company">Excellent Store</span>
	</div>
    </div>
  </div>


<!--HEADER END-->
<!--ADD PRODUCT MESSAGE-->
  <div class="panel panel-default" id="message" style="background-color: #104080; color: #fff;width: 300px;height: 60px;margin:  0 auto;margin-top: 5px;">
    <div class="panel-body" style="text-align: center;">המוצר נוסף לסל בהצלחה</div>
  </div>
	
	<div class="container">
                <div class="row">
                <!--CATEGORIES START-->
                    <div class="col-sm-3">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title" align="center"><a href="/cart">
                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>(<i id="countProducts"><?php echo $countItems; ?></i>)
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

					<!--PRODUCT START-->
				<div class="col-sm-9 ">
                <!--product image-->
					<div class="col-md-6">
                        <img src="<?php echo $product['image'];?>" width="350px" height="350px" alt="product image">
                       </div>
                       <!--product titel-->
                       <div class="col-md-6">
                        <div class="row">
                              <div class="col-md-12">
                               <h1><?php echo $product['name'];?></h1>
                               <span class="label label-primary">Excellent</span>
                               <span id="like_btn" class="label label-success" style="cursor: pointer;">LIKE</span>
                               <span id="likes" dir="rtl">אנשים אהבו את המוצר <i id="likes_count"><?php echo $product['likes']; ?></i> </span>
                                <h3 style="color: red;"><?php echo $product['price'];?>&#8362;</h3>

                                      <!--Add to cart-->
                                      <select name="color_select" id="color_select">
                                        <?php if(!empty($product['color_name'])): ?>
                                        <option value="<?php echo $product['color_name'];?>"><?php echo $product['color_name'];?></option>
                                       <?php endif ?>
                                        <?php if(!empty($product['color_name1'])): ?>
                                        <option value="<?php echo $product['color_name1'];?>"><?php echo $product['color_name1'];?></option>
                                       <?php endif ?>
                                       <?php if(!empty($product['color_name2'])): ?>
                                        <option value="<?php echo $product['color_name2'];?>"><?php echo $product['color_name2'];?></option>
                                       <?php endif ?>
                                       <?php if(!empty($product['color_name3'])): ?>
                                        <option value="<?php echo $product['color_name3'];?>"><?php echo $product['color_name3'];?></option>
                                       <?php endif ?>
                                       <?php if(!empty($product['color_name4'])): ?>
                                        <option value="<?php echo $product['color_name4'];?>"><?php echo $product['color_name4'];?></option>
                                       <?php endif ?>
                                       <?php if(!empty($product['color_name5'])): ?>
                                        <option value="<?php echo $product['color_name5'];?>"><?php echo $product['color_name5'];?></option>
                                       <?php endif ?>
                                      </select>
                                      <span name="submit" id="submit" class="btn btn-lg btn-success btn-full-width">
                                       להוסיף לסל
                                      </span>
                                      
                             </div>
                            </div>
                       </div>

                       
					  <hr>
						<div class="col-sm-9">
                            <!-- Nav tabs -->
                            <ul class="nav nav-pills">
                                <li class="active"><a data-toggle="pill" href="#description">תיאור</a></li>
                                <li><a data-toggle="pill" href="#foto">תמונות</a></li>
                                <li><a data-toggle="pill" href="#video">סרטון</a></li>

                              </ul>

                              <div class="tab-content">
                                <div id="description" class="tab-pane fade in active">
                                  <h3>תיאור</h3>
                                  <p><?php echo $product['description'];?></p>
                                </div>
                                <div id="foto" class="tab-pane fade">
                                  <?php if(!empty($product['image0'])): ?>
                                  <img class="anim" src="<?php echo $product['image0'];?>" width="350px" height="350px" alt="product image">
                                  <?php endif ?>
                                  <?php if(!empty($product['image1'])): ?>
                                  <img class="anim" src="<?php echo $product['image1'];?>" width="350px" height="350px" alt="product image">
                                  <?php endif ?>
                                  <?php if(!empty($product['image2'])): ?>
                                  <img class="anim" src="<?php echo $product['image2'];?>" width="350px" height="350px" alt="product image">
                                  <?php endif ?>
                                  <?php if(!empty($product['image3'])): ?>
                                  <img class="anim" src="<?php echo $product['image3'];?>" width="350px" height="350px" alt="product image">
                                  <?php endif ?>
                                  <?php if(!empty($product['image4'])): ?>
                                  <img class="anim" src="<?php echo $product['image4'];?>" width="350px" height="350px" alt="product image">
                                  <?php endif ?>
                                  <?php if(!empty($product['image5'])): ?>
                                  <img class="anim" src="<?php echo $product['image5'];?>" width="350px" height="350px" alt="product image">
                                  <?php endif ?>
                                  <?php if(!empty($product['image6'])): ?>
                                  <img class="anim" src="<?php echo $product['image6'];?>" width="350px" height="350px" alt="product image">
                                  <?php endif ?>
                                </div>
                                <div id="video" class="tab-pane fade">
                                  <h3>סרטון של מוצר</h3>
                                  <?php if(!empty($product['video'])): ?>
                                  <video width="400" height="400" controls>
                                      <source src="<?php echo $product['video']; ?>" type="video/mp4">
                                      Your browser does not support HTML5 video.
                                  </video>
                                  <?php else : ?>
                                    <p>למוצר זה אין סרטון</p>
                                  <?php endif ?>
                                </div>
                              </div>
                        </div> 
				</div> 	
    <!--PRODUCT END-->
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
	<script src="/../template/js/jquery-3.2.1.min.js"></script>
	<script src="/../template/js/bootstrap.js"></script>
  <!--LOGIN SCRIPT-->
  <script src="/../template/js/sign_in.js"></script>

                    
    <script>
       $(document).ready(function (){
          $("#like_btn").click(function (){
            var likes = '<?php echo $product['likes']; ?>';
            var id = '<?php echo $product['id']; ?>';
            likes++;
            $.ajax({
              url: '/likesAdd',
              type: 'POST',
              cashe: false,
              data: {'likes' :likes, 'id' :id},
              dataType: 'html',
              success: function(data){
                if (data == "no") {
                  alert("כדאי לשים לייק צריך להיכנס לאתר")
                }else if (data == "twotimes") {
                  alert("כבר שמת לייק למוצר זה")
                }else{
                  $('#likes_count').html(likes);
                }
              }
          });
        });
        //ajax Add To Cart
        $("#submit").click(function (){
        var color_select = $("#color_select").val();
        var id = '<?php echo $product['id']; ?>';
        $.ajax({
          url: '/productAddToCart',
          type: 'POST',
          cashe: false,
          data: {'color_select' :color_select, 'id' :id},
          dataType: 'html',
          success: function(data){
            if (data == "ok") {
             var count = $('#countProducts').html();
             count++;
             $('#countProducts').html(count);
              $("#message").slideDown('slow');
              setTimeout(function() { $("#message").slideUp('slow'); }, 2000);
            }
          }
        });
      });
      });
     </script>


     <script>
       $(document).ready(function (){
        $(".anim").hover(function(){
          $(this).animate({
              height: "700",
              width: "700"
          },"fast");
        },function(){
          $(this).animate({
              height: "350",
              width: "350"
          },"fast");
        });
       });
     </script>


                    
</body>
</html>