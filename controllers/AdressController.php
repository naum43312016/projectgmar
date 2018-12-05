<?php 
	class AdressController{
		public function actionIndex(){

			$categories = array();
	        $categories = Category::getCategoriesList();

	        $countItems = Cart::countItems();

			require_once(ROOT . '/views/adress/adress.php');
			return true;
		}
	}
 ?>