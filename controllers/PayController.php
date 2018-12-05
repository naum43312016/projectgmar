<?php 

	class PayController{


		public function actionIndex(){
			//do escape characters for database security
			$full_name = mysql_escape_string($_POST['full-name']);
			$city = mysql_escape_string($_POST['city']);
			$adress = mysql_escape_string($_POST['adress']);
			$phone = mysql_escape_string($_POST['phone']);
			$email = mysql_escape_string($_POST['email']);
			$postal_code = mysql_escape_string($_POST['postal-code']);
			$num_order = rand(111, 9999);


			date_default_timezone_set('Asia/Jerusalem');
            $date_of_order = date("Y-m-d H:i:s");
			


			$categories = array();
	        $categories = Category::getCategoriesList();
			//cart products and total price

			$countItems = Cart::countItems();
			$cart_products = array();
	        $cart_products = Cart::getCartProducts();

	        $products_colors = Cart::getColors();


	        if ($cart_products) {
            
            $productsIds = array_keys($cart_products);

            //array with information about producs
            $products = Product::getProductsById($productsIds);

            //total price of products in cart
            $totalPrice = Cart::getTotalPrice($products);
        	}

        	$products_of_order = implode(",",$productsIds) . ' | ' . implode(",",$cart_products) . ' | ' . implode(",",$products_colors) ;

        	//order information array
			$order_array = array(
				'name' => $full_name,
				'city' => $city,
				'adress' => $adress,
				'phone' => $phone,
				'email' => $email,
				'postal_code' => $postal_code,
				'num_order' => $num_order,
				);
			$_SESSION['order'] = $order_array;


           $result =  Order::orderSave($full_name,$city,$adress,$phone,$email,$postal_code,$num_order,$totalPrice,$products_of_order,$date_of_order);

           require_once(ROOT . '/views/pay/pay.php');
			return true;
			
		}


		public function actionSuccess($number_order){

			$categories = array();
	        $categories = Category::getCategoriesList();
			//cart products and total price
			$countItems = Cart::countItems();
			$cart_products = array();
	        $cart_products = Cart::getCartProducts();


	        if ($cart_products) {
            
            $productsIds = array_keys($cart_products);

            //array with information about producs
            $products = Product::getProductsById($productsIds);

            //total price of products in cart
            $totalPrice = Cart::getTotalPrice($products);
        	}

			$order_info = $_SESSION['order'];

			foreach ($cart_products as $id => $quantity) {
				Product::stockProduct($id,$quantity);
			}
			
			//clear cart and destroy sessions
			Cart::clear();

			require_once(ROOT . '/views/pay/successPayment.php');
			return true;
		}

		public function actionCancel(){

			$categories = array();
	        $categories = Category::getCategoriesList();
	    	$countItems = Cart::countItems();
	        Cart::clear();

			require_once(ROOT . '/views/pay/cancelPayment.php');
			return true;
		}

	}
 ?>