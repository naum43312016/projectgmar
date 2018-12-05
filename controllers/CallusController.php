<?php

	class CallusController{
		public function actionIndex(){


			$categories = array();
	        $categories = Category::getCategoriesList();

	         if (isset($_POST['exit_user'])) {
            	if (isset($_SESSION['user_name'])) {
            		unset($_SESSION['user_name']);
					unset($_SESSION['user_id']);
            	}
            }

	        $countItems = Cart::countItems();
			require_once(ROOT . '/views/call/call_us.php');
			return true;
		}
	}

?>