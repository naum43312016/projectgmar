<?php

	class CatalogController{
		public function actionCategory($categoryId,$page)
    {
        
        
        $categories = array();
        $categories = Category::getCategoriesList();
        
        $categoryname = Category::getCategoryById($categoryId);

        $countOfItems = Product::countItemsInCategory($categoryId);

        if (isset($_POST['exit_user'])) {
                if (isset($_SESSION['user_name'])) {
                    unset($_SESSION['user_name']);
					unset($_SESSION['user_id']);
                }
            }

        //count of pages
        $countPages = ceil($countOfItems/6);


        $categoryProducts = array();
        $categoryProducts = Product::getProductsListByCategory($categoryId,$page);

        //items in Cart
        $countItems = Cart::countItems();

        
        
        require_once (ROOT . '/views/category/category.php');
        return true;
    }
	}