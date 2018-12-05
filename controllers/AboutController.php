<?php

	
	class AboutController
	{
		
		public function actionIndex(){
			
			$categories = array();
	        $categories = Category::getCategoriesList();

	        $countItems = Cart::countItems();

	         if (isset($_POST['exit_user'])) {
            	if (isset($_SESSION['user_name'])) {
            		unset($_SESSION['user_name']);
            	}
            }
            
			require_once(ROOT . '/views/about/about_us.php');
			return true;
		}
	}
?>