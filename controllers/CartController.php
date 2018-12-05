<?php 

	
	class CartController
	{
		
		public function actionIndex(){

			if (isset($_POST['submit'])) {
				$delProductId = $_POST['deleteProduct'];
	        	Cart::deleteProduct($delProductId);
	        }

	         if (isset($_POST['exit_user'])) {
            	if (isset($_SESSION['user_name'])) {
            		unset($_SESSION['user_name']);
					unset($_SESSION['user_id']);
            	}
            }
			

			$categories = array();
	        $categories = Category::getCategoriesList();

	        $countItems = Cart::countItems();

	        $productsInCart = array();
	        $productsInCart = Cart::getCartProducts();


	        if ($productsInCart) {
            
            $productsIds = array_keys($productsInCart);

            //array with information about producs
            $products = Product::getProductsById($productsIds);

            //total price of products in cart
            $totalPrice = Cart::getTotalPrice($products);
        }

			require_once(ROOT . '/views/cart/cart.php');
			return true;
		}


	}

?>