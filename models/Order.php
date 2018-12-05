<?php
class Order{
	public static function orderSave($full_name,$city,$adress,$phone,$email,$postal_code,$num_order,$totalPrice,$products_of_order,$date_of_order){


        $db = Db::getConnection();

        
        $sql = 'INSERT INTO product_order (user_name, town, adress, user_phone, email, mikud,  num_order,  totalPrice, products,date_of_order) '
                . 'VALUES (:full_name, :city, :adress, :phone, :email, :postal_code, :num_order, :totalPrice, :products_of_order, :date_of_order)';


        $result = $db->prepare($sql);
        $result->bindParam(':full_name', $full_name, PDO::PARAM_STR);
        $result->bindParam(':city', $city, PDO::PARAM_STR);
        $result->bindParam(':adress', $adress, PDO::PARAM_STR);
        $result->bindParam(':phone', $phone, PDO::PARAM_INT);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':postal_code', $postal_code, PDO::PARAM_INT);
        $result->bindParam(':num_order', $num_order, PDO::PARAM_INT);
        $result->bindParam(':totalPrice', $totalPrice, PDO::PARAM_INT);
        $result->bindParam(':products_of_order', $products_of_order, PDO::PARAM_STR);
        $result->bindParam(':date_of_order', $date_of_order, PDO::PARAM_STR);
        
        return $result->execute();

	}
}
?>