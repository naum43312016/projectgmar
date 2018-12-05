<?php 
 

 return array(
 		
 		'about' => 'About/Index',
 		'cart' => 'Cart/Index',
 		'call' => 'Callus/Index',
 		'adress' => 'Adress/Index',
 		'pay' => 'Pay/Index',

 		'product/([0-9]+)' => 'Product/Index/$1',
 		'category/([0-9]+)/page-([0-9]+)' => 'Catalog/Category/$1/$2',

 		//paypal payment
 		'success/([0-9]+)' => 'Pay/Success/$1',
 		'cancel' => 'Pay/Cancel',

 		//admin
 		'admin' => 'Admin/Login', 
 		'adminHome' => 'Admin/Home', 
 		'adminOrderList' => 'Admin/Orderlist',
 		'order/edit/([0-9]+)' => 'Admin/Orderedit/$1',

 		'adminProductList' => 'Admin/Productlist',
 		'productedit/([0-9]+)' => 'Admin/Productedit/$1',
 		'deleteproduct' => 'Admin/Productdelete',
 		'creat/product' => 'Admin/Productadd',
 		'addcomplete' => 'Admin/Successadd',
 		'editSuccess' => 'Admin/Successedit',

 		'adminCategoryList' => 'Admin/Categorylist',
 		'category/edit/([0-9]+)' => 'Admin/Categoryedit/$1',
 		'add/category' => 'Admin/Categoryadd',
 		'errorAdmin' => 'Admin/Error', 
 		'adminExit' => 'Admin/Exit', 

 		'adminStatistics' =>'Admin/Statistics',
 		'adminEnterStatistics' =>'Admin/EnterStatistics',

 		'siteUsers' =>'Admin/Users',
 		'useredit/([0-9]+)' => 'Admin/Usersedit/$1',
 		'adminUsers' => 'Admin/Admins',
 		'Admin/Add' => 'Admin/Adminadd',
 		

 		'loginCheck' =>'User/Login',
 		'registerCheck' =>'User/Register',
 		'getNewPassword' => 'User/Getpass',
 		'likesAdd' =>'User/Likes',
 		'productAddToCart' => 'Product/Add',

 		'adminStock' =>'Admin/Stock',

 		'user/([0-9]+)' => 'User/Info/$1',

 		'' => 'Site/Index',
 	);