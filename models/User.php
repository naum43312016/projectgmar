<?php
	class User{

        public static function getAllUsers(){
        $db = Db::getConnection();
        $sql = 'SELECT * FROM users';

        
        $result = $db->prepare($sql);

        
        $result->setFetchMode(PDO::FETCH_ASSOC);
        
        
        $result->execute();

        
        $i = 0;
        $users = array();
        while ($row = $result->fetch()) {
            $users[$i]['id'] = $row['id'];
            $users[$i]['login'] = $row['login'];
            $users[$i]['password'] = $row['password'];
            $users[$i]['email'] = $row['email'];
            $users[$i]['like_products'] = $row['like_products'];
            $i++;
        }
        return $users;
        }

        public static function userRegister($login,$password,$email){
        $db = Db::getConnection();

        $sql = 'INSERT INTO users (login, password, email) '
                . 'VALUES (:login, :password, :email)';


        $result = $db->prepare($sql);
        $result->bindParam(':login', $login, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        return $result->execute();
        }

        public static function getUserId($login){
        $db = Db::getConnection();

        $result = $db->query("SELECT id FROM users WHERE login = '$login'");

        while ($row = $result->fetch()) {
            $id_user = $row['id'];
        }
        return $id_user;
    }

        public static function getUsersLikes($login){
        $db = Db::getConnection();

        $result = $db->query("SELECT like_products FROM users WHERE login = '$login'");

        while ($row = $result->fetch()) {
            $like = $row['like_products'];
           }
        return $like;
    }

        public static function userLike($id,$login){

        $like_products = self::getUsersLikes($login);
        if ($like_products == '') {
            $like_products = $id; 
        }else{
            $like_products .= ',' . $id; 
        }

        $db = Db::getConnection();
        
        $sql = "UPDATE users
            SET 
                like_products = :like_products
            WHERE login = :login";

        
        $result = $db->prepare($sql);
        $result->bindParam(':login', $login, PDO::PARAM_STR);
        $result->bindParam(':like_products', $like_products, PDO::PARAM_STR);
        return $result->execute();
        }

        public static function getUserById($id){
        
        $db = Db::getConnection();

        
        $sql = 'SELECT * FROM users WHERE id = :id';

        
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        //array +
        $result->setFetchMode(PDO::FETCH_ASSOC);

        
        $result->execute();

        
        return $result->fetch();
        }

        public static function userDelete($id){
        $db = Db::getConnection();

        
        $sql = 'DELETE FROM users WHERE id = :id';

        
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        return $result->execute();
        }

        public static function adminDelete($id){
        $db = Db::getConnection();

        
        $sql = 'DELETE FROM admin WHERE id = :id';

        
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        return $result->execute();
        }

        public static function editUser($id,$login,$password){
            $db = Db::getConnection();
        
        $sql = "UPDATE users
            SET 
                login = :login,
                password = :password
            WHERE id = :id";

        
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':login', $login, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        return $result->execute();
        }


        public static function getAllAdmins(){
        $db = Db::getConnection();
        $sql = 'SELECT * FROM admin';

        
        $result = $db->prepare($sql);

        //get data by array
        $result->setFetchMode(PDO::FETCH_ASSOC);
        
        //execute the command
        $result->execute();

        //get and return rresult
        $i = 0;
        $users = array();
        while ($row = $result->fetch()) {
            $users[$i]['id'] = $row['id'];
            $users[$i]['login'] = $row['login'];
            $users[$i]['password'] = $row['password'];
            $i++;
        }
        return $users;
        }

        public static function AdminUserAdd($login,$password){
        $db = Db::getConnection();

        $sql = 'INSERT INTO admin (login, password) '
                . 'VALUES (:login, :password)';


        $result = $db->prepare($sql);
        $result->bindParam(':login', $login, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        return $result->execute();
        }

        public static function getUserByEmail($email){
        
        $db = Db::getConnection();

        
        $sql = 'SELECT * FROM users WHERE email = :email';

        
        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);

        
        $result->setFetchMode(PDO::FETCH_ASSOC);

        
        $result->execute();

        
        return $result->fetch();
        }

        public static function addNewPassword($password,$email){
            $db = Db::getConnection();
        
        $sql = "UPDATE users
            SET 
                password = :password
            WHERE email = :email";

        
        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        return $result->execute();
        }
}
?>