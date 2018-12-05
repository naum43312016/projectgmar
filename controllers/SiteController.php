<?php

	class SiteController
	{
		
		public function actionIndex(){

			$categories = array();
	        $categories = Category::getCategoriesList();

	        $products = array();
            $products = Product::getRankProducts(12);

            Stat::addStat();

            $countItems = Cart::countItems();

            if (isset($_POST['exit_user'])) {
            	if (isset($_SESSION['user_name'])) {
            		unset($_SESSION['user_name']);
            		unset($_SESSION['user_id']);
            	}
            }
            
			require_once(ROOT . '/views/site/index.php');
			return true;
		}
	}

?>