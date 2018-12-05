<?php
	class AdminController{

		//LOGIN START
		public function actionLogin(){

			if (isset($_POST['login_submit'])) {
				$_SESSION['check_admin'] = false;
				$admin_login = mysql_escape_string($_POST['admin_login']);
				$admin_password = mysql_escape_string($_POST['admin_password']);
				$admin_data = User::getAllAdmins();
				foreach ($admin_data as $admin) {
					if ($admin_login == $admin['login']){
						if (crypt($admin_password, $admin['password']) == $admin['password']) {
						   $_SESSION['check_admin'] = true;
						   header("Location: /adminHome");
						}
						
					}
				}
				echo "<p style='color:red;text-align:center;font-size:25px;'>סיסמה או שם משתמש לא נכונים</p>";
			}

			require_once(ROOT . '/views/admin/admin_login/admin_login.php');
			return true;
		}
		//LOGIN END

		//HOME START
		public function actionHome(){
			
			if ($_SESSION['check_admin'] == 1) {
				require_once(ROOT . '/views/admin/admin_home/admin_home.php');
			    return true;
			}else{
				self::actionError();
			}
		}
		//HOME END


		//ERROR START
		public function actionError(){
			require_once(ROOT . '/views/admin/admin_error/admin_error.php');
			return true;
		}
		//ERROR END

		//EXIT START
		public function actionExit(){
			session_destroy();
			//REDIRECT
				$url = '/admin';
				echo '<script type="text/javascript">'; 
				echo 'window.location.href="'.$url.'";'; 
				echo '</script>'; 
		}
		//EXIT END

		//ORDER START
		public function actionOrderlist(){
			if ($_SESSION['check_admin'] == 1) {
				$order_admin = Adminorders::OrdersList();
				//print_r($order_admin);
				//echo $order_admin[0]['id'];
				$products_of_order = explode("|", $order_admin[0]['products']);

				$products_ids = explode(",", $products_of_order[0]);
				$products_camut = explode(",", $products_of_order[1]);
				$products_colors = explode(",", $products_of_order[2]);
				
				require_once(ROOT . '/views/admin/admin_order/admin_order_list.php');
			    return true;
			}else{
				self::actionError();
			}
		}

		public function actionOrderedit($id){

			if ($_SESSION['check_admin'] == 1) {
			$order = Adminorders::getOrderById($id);

			if (isset($_POST['delete_order'])) {
				Adminorders::orderDelete($id);
				header("Location: /adminOrderList");
			}
			if (isset($_POST['edit_order'])) {
				$order_status = $_POST['status'];
				Adminorders::editOrder($id,$order_status);
				header("Location: /adminOrderList");
			}

			require_once(ROOT . '/views/admin/admin_order/admin_order_edit.php');
			return true;
		}else{
				self::actionError();
			}
		}
		//ORDER END

		//CATEGORY START
		public function actionCategorylist(){

			if ($_SESSION['check_admin'] == 1) {
			$admin_categories = Admincategory::getCategoriesList();

			require_once(ROOT . '/views/admin/admin_category/admin_category_list.php');
			return true;
			}else{
				self::actionError();
			}
		}

		public function actionCategoryadd(){

			if ($_SESSION['check_admin'] == 1) {
			if (isset($_POST['add-category'])) {
				$cat_name = $_POST['category-name'];
				$cat_sort = $_POST['category-sort'];
				Admincategory::addCategory($cat_name,$cat_sort);
			}
			require_once(ROOT . '/views/admin/admin_category/admin_category_add.php');
			return true;
			}else{
				self::actionError();
			}
		}

		public function actionCategoryedit($id){

			if ($_SESSION['check_admin'] == 1) {
			$category = Admincategory::getCategoryById($id);

			if (isset($_POST['delete_category'])) {
				Admincategory::categoryDelete($id);
				header("Location: /adminCategoryList");
			}
			if (isset($_POST['edit_category'])) {
				$category_sort = $_POST['category-sort'];
				$category_name = $_POST['category-name'];

				Admincategory::categoryEdit($id,$category_sort,$category_name);
				header("Location: /adminCategoryList");
			}

			require_once(ROOT . '/views/admin/admin_category/admin_category_edit.php');
			return true;
			}else{
				self::actionError();
			}
		}
		//CATEGORY END

		//PRODUCT START
		public function actionProductlist(){

			if ($_SESSION['check_admin'] == 1) {
			$products_admin = Adminproduct::getProductList();

			require_once(ROOT . '/views/admin/admin_product/admin_products_list.php');
			return true;
			}else{
				self::actionError();
			}
		}

		public function actionProductadd(){
			if ($_SESSION['check_admin'] == 1) {


				$categories = array();
	        	$categories = Category::getCategoriesList();

				//photo path for database
				$innerdir_image = '';
				$innerdir_image0 = '';
				$innerdir_image1 = '';
				$innerdir_image2 = '';
				$innerdir_image3 = '';
				$innerdir_image4 = '';
				$innerdir_image5 = '';
				$innerdir_image6 = '';

				$innerdir_video = '';

				

				if (isset($_POST['new_product_add_btn'])) {

					//errors flag
            		$errors = false;

					//variables from form
					$new_product_name = $_POST['new_product_name'];
					$new_product_price = $_POST['new_product_price'];
					$new_product_category = $_POST['new_product_category'];
					$new_product_brand = $_POST['new_product_brand'];
					$new_product_stock = $_POST['new_product_stock'];
					$new_product_rank = $_POST['new_product_rank'];
					$new_product_status = $_POST['new_product_status'];
					$new_product_description = ltrim($_POST['new_product_description']);

					//colors product for database
					$new_product_color1 = $_POST['new_product_color1'];
					$new_product_color2 = $_POST['new_product_color2'];
					$new_product_color3 = $_POST['new_product_color3'];
					$new_product_color4 = $_POST['new_product_color4'];
					$new_product_color5 = $_POST['new_product_color5'];
					$new_product_color6 = $_POST['new_product_color6'];


					//IMAGE START
					if (is_uploaded_file($_FILES["new_product_image"]["tmp_name"])) {
						$imageFileType = pathinfo($_FILES["new_product_image"]["name"],PATHINFO_EXTENSION);
						$file_size = $_FILES["new_product_image"]["size"];
						if ($imageFileType == jpg || $imageFileType == jpeg || $imageFileType == png) {
							if ($file_size < 10000000) {//if big from 10 mb
								$name = rand(111, 99999);
								$innerdir_image = "/template/images/upload_images/{$name}.{$imageFileType}";
								move_uploaded_file($_FILES["new_product_image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . $innerdir_image);
							}else{
								$errors[] = "תמונה ראשית גדולה מ10 megabyte";
							}
						}else{
							$errors[] = "jpg png jpeg אפשר להוסיף רק קבצים";
						}
					}
					//IMAGE END

					//VIDEO START
					if (is_uploaded_file($_FILES["new_product_video"]["tmp_name"])) {
						$videoFileType = pathinfo($_FILES["new_product_video"]["name"],PATHINFO_EXTENSION);
						$file_size = $_FILES["new_product_video"]["size"];
						if ($videoFileType == mp4 || $ivideoFileType == ogg || $videoFileType == webm) {
							if ($file_size < 20000000) {//if big from 20 mb
								$name = rand(111, 99999);
								$innerdir_video = "/template/videos/upload/{$name}.{$videoFileType}";
								move_uploaded_file($_FILES["new_product_video"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . $innerdir_video);
							}else{
								$errors[] = "סרטון גדולה מ20 megabyte";
							}
						}else{
							$errors[] = "mp4 ogg webm אפשר להוסיף רק קבצים";
						}
					}
					//VIDEO END
					
					//MULTIPLE PHOTO UPLOAD START
					$total = count($_FILES['new_product_multiple_images']['name']);
					//check files
						for($i=0; $i<$total; $i++){
						  $imageFileType = pathinfo($_FILES["new_product_multiple_images"]["name"][$i],PATHINFO_EXTENSION);
						  $file_size = $_FILES["new_product_multiple_images"]["size"][$i];
						  $tmpFilePath = $_FILES['new_product_multiple_images']['tmp_name'][$i];
					 if ($tmpFilePath != ""){
						  if ($imageFileType != jpg && $imageFileType != jpeg && $imageFileType != png) {
						  	 $errors[] = "בגלריה jpg png jpeg אפשר להוסיף רק קבצים";
						  }
						  if ($file_size > 10000000) {//if big from 10 mb
						  	$errors[] = "תמונה בגלריה גדולה מ10 megabyte";
						  }
						}
					}

					if ($errors == false) {
					// Loop each file
						for($i=0; $i<$total; $i++) {
						  //Get the temp file path
						  $imageFileType = pathinfo($_FILES["new_product_multiple_images"]["name"][$i],PATHINFO_EXTENSION);
						  $tmpFilePath = $_FILES['new_product_multiple_images']['tmp_name'][$i];
						  if ($tmpFilePath != ""){ //check if have files
						  	$rand_gallery_name = rand(111, 99999);
						    //Setup new file path
						    $inner_path = "/template/images/upload_images/{$rand_gallery_name}.{$imageFileType}";
						    $newFilePath = $_SERVER['DOCUMENT_ROOT'] . $inner_path;

						    //Upload the file
						    if(move_uploaded_file($tmpFilePath, $newFilePath)) {

						      ${'innerdir_image' . $i} = $inner_path;
						    }
						  }
					}


				//MULTIPLE PHOTO UPLOAD END
				//IMAGES END
					
					//SAVE PRODUCT TO DATABASE
						$res = Adminproduct::saveProduct($new_product_name,$new_product_price,$new_product_category,$new_product_brand,$new_product_stock,$new_product_rank,$new_product_status,$new_product_description,$innerdir_video,
							$new_product_color1,$new_product_color2,$new_product_color3,$new_product_color4,$new_product_color5,$new_product_color6,
							$innerdir_image,$innerdir_image0,$innerdir_image1,$innerdir_image2,$innerdir_image3,$innerdir_image4,$innerdir_image5,$innerdir_image6);
						if ($res) {
							header("Location: /addcomplete");
						}
					}
				
			}

			require_once(ROOT . '/views/admin/admin_product/admin_product_creat.php');
			return true;
			}else{
				self::actionError();
			}
		}

		public function actionSuccessadd(){
			require_once(ROOT . '/views/admin/admin_product/admin_product_successadd.php');
			return true;
		}

		//PRODUCT EDIT
		public function actionProductedit($id){
			if ($_SESSION['check_admin'] == 1) {

			$product = Product::getProductById($id);
			$categories = array();
	        $categories = Category::getCategoriesList();


	        //photo path for database
				$innerdir_image = $product['image'];
				$innerdir_image0 = $product['image0'];
				$innerdir_image1 = $product['image1'];
				$innerdir_image2 = $product['image2'];
				$innerdir_image3 = $product['image3'];
				$innerdir_image4 = $product['image4'];
				$innerdir_image5 = $product['image5'];
				$innerdir_image6 = $product['image6'];

				$innerdir_video = $product['video'];
	        //delete
	        if (isset($_POST['delete_btn'])) {
				Adminproduct::productDelete($id,$innerdir_image,$innerdir_image0,$innerdir_image1,$innerdir_image2,$innerdir_image3,$innerdir_image4,$innerdir_image5,$innerdir_image6,$innerdir_video);
				//REDIRECT
				$url = '/deleteproduct';
				echo '<script type="text/javascript">'; 
				echo 'window.location.href="'.$url.'";'; 
				echo '</script>'; 
			}

			//edit product
			if (isset($_POST['edit_btn'])) {

				//errors flag
            	$errors = false;
				//variables from form
				$product_name = $_POST['product_name'];
				$product_price = $_POST['product_price'];
				$product_category = $_POST['product_category'];
				$product_brand = $_POST['brand'];
				$product_rank = $_POST['product_rank'];
				$product_status = $_POST['product_status'];
				$product_description = $_POST['product_description'];
				$product_stock = $_POST['product_stock'];
				//colors product for database
				$product_color1 = $_POST['product_color1'];
				$product_color2 = $_POST['product_color2'];
				$product_color3 = $_POST['product_color3'];
				$product_color4 = $_POST['product_color4'];
				$product_color5 = $_POST['product_color5'];
				$product_color6 = $_POST['product_color6'];

				//Uplaod image 				
				if (is_uploaded_file($_FILES["product_image"]["tmp_name"])) {
						$imageFileType = pathinfo($_FILES["product_image"]["name"],PATHINFO_EXTENSION);
						$file_size = $_FILES["product_image"]["size"];
						if ($imageFileType == jpg || $imageFileType == jpeg || $imageFileType == png) {
							if ($file_size < 10000000) {
								unlink($_SERVER['DOCUMENT_ROOT'] . $innerdir_image);
								$name = rand(111, 99999);
								$innerdir_image = "/template/images/upload_images/{$name}.{$imageFileType}";
								move_uploaded_file($_FILES["product_image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . $innerdir_image);
							}else{
								$errors[] = "תמונה ראשית גדולה מ10 megabyte";
							}
						}else{
							$errors[] = "jpg png jpeg אפשר להוסיף רק קבצים";
						}
					}

				//delete gallery photo
				$check = 0;
				for ($i=0; $i <=6 ; $i++) { 
					if ($_POST['img_' . $i] == 1) {
						$check = 1;
						unlink($_SERVER['DOCUMENT_ROOT'] . ${'innerdir_image' . $i});
						${'innerdir_image' . $i} = "";
					}
				}
				if ($check == 1) {
					Adminproduct::galleryDelete($id,$innerdir_image0,$innerdir_image1,$innerdir_image2,$innerdir_image3,$innerdir_image4,$innerdir_image5,$innerdir_image6);
				}


				//VIDEO START
					if (is_uploaded_file($_FILES["product_video"]["tmp_name"])) {
						$videoFileType = pathinfo($_FILES["product_video"]["name"],PATHINFO_EXTENSION);
						$file_size = $_FILES["product_video"]["size"];
						if ($videoFileType == mp4 || $ivideoFileType == ogg || $videoFileType == webm) {
							if ($file_size < 20000000) {//if big from 20 mb
								unlink($_SERVER['DOCUMENT_ROOT'] . $innerdir_video);
								$name = rand(111, 99999);
								$innerdir_video = "/template/videos/upload/{$name}.{$videoFileType}";
								move_uploaded_file($_FILES["product_video"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . $innerdir_video);
							}else{
								$errors[] = "סרטון גדולה מ20 megabyte";
							}
						}else{
							$errors[] = "mp4 ogg webm אפשר להוסיף רק קבצים";
						}
					}
					//VIDEO END

				//MULTIPLE PHOTO UPLOAD START

				//CHECK FILES
				$total = count($_FILES['product_multiple_images']['name']);
					//check files
						for($i=0; $i<$total; $i++){
						  $imageFileType = pathinfo($_FILES["product_multiple_images"]["name"][$i],PATHINFO_EXTENSION);
						  $file_size = $_FILES["product_multiple_images"]["size"][$i];
						  $tmpFilePath = $_FILES['product_multiple_images']['tmp_name'][$i];
					 if ($tmpFilePath != ""){
						  if ($imageFileType != jpg && $imageFileType != jpeg && $imageFileType != png) {
						  	 $errors[] = "בגלריה jpg png jpeg אפשר להוסיף רק קבצים";
						  }
						  if ($file_size > 10000000) {//if big from 10 mb
						  	$errors[] = "תמונה בגלריה גדולה מ10 megabyte";
						  }
						}
					}

					if ($errors == false) {
					$total = count($_FILES['product_multiple_images']['name']);
					// Loop  each file					
						for($i=0; $i<$total; $i++) {
						  //Get file path
						  $tmpFilePath = $_FILES['product_multiple_images']['tmp_name'][$i];
						  $imageFileType = pathinfo($_FILES["product_multiple_images"]["name"][$i],PATHINFO_EXTENSION);
						  if ($tmpFilePath != ""){
						  	$rand_gallery_name = rand(111, 99999);
						    //Setup new file path
						    $inner_path = "/template/images/upload_images/{$rand_gallery_name}.{$imageFileType}";
						    $newFilePath = $_SERVER['DOCUMENT_ROOT'] . $inner_path;

						    //Upload the file
						    if(move_uploaded_file($tmpFilePath, $newFilePath)) {
						    	for ($y=0; $y <=6 ; $y++) { 
									if (empty(${'innerdir_image' . $y})) {
										${'innerdir_image' . $y} = $inner_path;
										break;
									}
								}
						    }
						  }
						}

				$res = Adminproduct::updateProduct($id,$product_name,$product_price,$product_category,$product_brand,$product_stock,$product_rank,$product_status,$product_description,$innerdir_video,
					$product_color1,$product_color2,$product_color3,$product_color4,$product_color5,$product_color6,
					$innerdir_image,$innerdir_image0,$innerdir_image1,$innerdir_image2,$innerdir_image3,$innerdir_image4,$innerdir_image5,$innerdir_image6);
				if ($res) {
					//REDIRECT
					$url = '/editSuccess';
					echo '<script type="text/javascript">'; 
					echo 'window.location.href="'.$url.'";'; 
					echo '</script>'; 
				}
			}
		}

			require_once(ROOT . '/views/admin/admin_product/admin_product_edit.php');
			return true;
		}else{
				self::actionError();
			}
		}

		public function actionProductdelete(){
			require_once(ROOT . '/views/admin/admin_product/admin_product_successdelete.php');
			return true;
		}

		public function actionSuccessedit(){
			require_once(ROOT . '/views/admin/admin_product/admin_successedit.php');
			return true;
		}
		//PRODUCT END

		//STOCK START
		public function actionStock(){

			if ($_SESSION['check_admin'] == 1) {
			$products = Adminproduct::getProductsStock();

			require_once(ROOT . '/views/admin/admin_product/admin_stock_product.php');
			return true;
			}else{
				self::actionError();
			}
		}
		//STOCK END

		//STATISTICS START
		public function actionStatistics(){

			if ($_SESSION['check_admin'] == 1) {
			$products_admin = Adminproduct::getProductList();

			require_once(ROOT . '/views/admin/admin_stat/admin_stat.php');
			return true;
			}else{
				self::actionError();
			}
		}

		public function actionEnterStatistics(){

			if ($_SESSION['check_admin'] == 1) {
			$allEnters = Stat::getAllEnters();

			$monthEnters = Stat::getMonthEnters();

			require_once(ROOT . '/views/admin/admin_stat/admin_enter_stat.php');
			return true;
			}else{
				self::actionError();
			}
		}
		//users
		public function actionUsers(){
		if ($_SESSION['check_admin'] == 1) {
		$users_info = User::getAllUsers();
 		require_once(ROOT . '/views/admin/admin_users/users.php');
		return true;
		}else{
			self::actionError();
		}
 	}

 		public function actionUsersedit($id){
 			if ($_SESSION['check_admin'] == 1) {

 				$user = User::getUserById($id);

 				if (isset($_POST['delete_user'])) {
					User::userDelete($id);
					header("Location: /siteUsers");
				}
				if (isset($_POST['edit_user'])) {
					$user_login = $_POST['login'];
					User::editUser($id,$user_login,$user_password);
					header("Location: /siteUsers");
				}
 				require_once(ROOT . '/views/admin/admin_users/editusers.php');
				return true;
 			}else{
			self::actionError();
		}
 		}

 		public function actionAdmins(){
		if ($_SESSION['check_admin'] == 1) {
		

		if (isset($_POST['delete_admin'])) {
			$id = $_POST['id'];
			User::adminDelete($id);
		}

		$admins = User::getAllAdmins();
 		require_once(ROOT . '/views/admin/admin_users/admins.php');
		return true;
		}else{
			self::actionError();
		}
 	}

 		public function actionAdminadd(){
 			if ($_SESSION['check_admin'] == 1) {
 				if (isset($_POST['add-admin'])) {
 					$login = $_POST['login_admin'];
 					$password_admin = $_POST['password_admin'];
 					$password = crypt($password_admin);
 					$res = User::AdminUserAdd($login,$password);
 					if ($res) {
 						header("Location: /adminUsers");
 					}
 				}
 				require_once(ROOT . '/views/admin/admin_users/adminadd.php');
				return true;
 			}else{
			self::actionError();
			}
 		}
}
?>