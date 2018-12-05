<?php
	class ProductController{
		public function actionIndex($id){

			$categories = array();
	        $categories = Category::getCategoriesList();
	        
	        $product = array();
	        $product = Product::getProductById($id);

	        if (isset($_POST['exit_user'])) {
            	if (isset($_SESSION['user_name'])) {
            		unset($_SESSION['user_name']);
					unset($_SESSION['user_id']);
            	}
            }


	       //statistics
	        Product::statOfProduct($id);

	        $countItems = Cart::countItems();

			require_once(ROOT . '/views/product/product.php');
			return true;
		}

		public function actionAdd(){
			$selected_color = $_POST['color_select'];
			$id = $_POST['id'];
	        $res = Cart::addProduct($id,$selected_color);
	        if ($res) {
	        	echo "ok";
 				exit();
	        }
		}
	} 
?>