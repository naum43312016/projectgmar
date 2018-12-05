<?php 
 class UserController{
 	public function actionLogin(){
 		$login = mysql_escape_string($_POST['login']);
		$password = mysql_escape_string($_POST['password']);
		$login = trim($login);
		$password = trim($password);
		
		
		$users = User::getAllUsers();
		foreach ($users as $user) {
		if ($user['login'] == $login) {
			if (crypt($password, $user['password']) == $user['password']){
			$_SESSION['user_name'] = $login;
			$_SESSION['user_id'] = $user['id'];
			echo $login . ',' . $_SESSION['user_id'];
			exit();
		}
		}
	 }
			echo "error_login";
			exit();
 	}

 	public function actionRegister(){
 		$login = mysql_escape_string($_POST['login']);
		$password = mysql_escape_string($_POST['password']);
		$email = mysql_escape_string($_POST['email']);
		$login = trim($login);
		$password = trim($password);
		$email = trim($email);
		if (strlen($login) < 3 || strlen($login) > 12 || strlen($password) < 3 || strlen($password) > 12) {
			echo "size_data";
			exit();
		}

		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			echo "email_error";
			exit();
		}

		$users = User::getAllUsers();
		foreach ($users as $user) {
		if ($user['login'] == $login) {
			echo "busy";
			exit();
		}
		if ($user['email'] == $email) {
			echo "email_busy";
			exit();
		}
	 }
	 	$password = crypt($password);

		$result = User::userRegister($login,$password,$email);
		if ($result) {
			$_SESSION['user_name'] = $login;
			$_SESSION['user_id'] = User::getUserId($login);
			echo $login . ',' . $_SESSION['user_id'];
			exit();
		}else{
			echo "error";
			exit();
		}
 	}

 	public function actionLikes(){
 		$likes = $_POST['likes'];
 		$id = $_POST['id'];
 		if (!isset($_SESSION['user_name']) || $_SESSION['user_name'] == ''){
 			echo "no";
 			exit();
 		}


 		$login = $_SESSION['user_name'];

 		//likes from user
		$products_likes = User::getUsersLikes($login);
		$products_likes_id = explode(",", $products_likes);
		foreach ($products_likes_id as $ids) {
			if ($ids == $id) {
				echo "twotimes";
				exit();
			}
		}
		

 		$res_product = Product::productLike($id,$likes);
 		if ($res_product) {
 			$res_user = User::userLike($id,$login);
 			if ($res_user) {
 				echo $likes;
 			}
 		}
 	}

 	public function actionInfo($id){
		if($_SESSION['user_id'] == $id){
 		$categories = array();
	    $categories = Category::getCategoriesList();
	    $countItems = Cart::countItems();
 		$user = User::getUserById($id);
 		$likes_id = explode(",", $user['like_products']);
 		require_once(ROOT . '/views/user/user.php');
		return true;
		}else{
			exit();
		}
 	}

 	public function actionGetpass(){
 		$email = mysql_escape_string($_POST['email']);
 		$email = trim($email);
 		$result = User::getUserByEmail($email);
 		if ($result) {
 			$rand_pas = rand(999,99999);
 			mail($email,"קבלת סיסמה חדשה","סיסמה חדשה  $rand_pas");
 			$password = crypt($rand_pas);
 			$res = User::addNewPassword($password,$email);
 			if ($res) {
 				echo "OK";
 				exit();
 			}
 		}
 	}

 }
?>