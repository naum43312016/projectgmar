<?php

	class Adminorders{
		public static function OrdersList(){
		
        $db = Db::getConnection();

        
        $sql = 'SELECT * FROM product_order ORDER BY id DESC ';

        
        $result = $db->prepare($sql);

        
        $result->setFetchMode(PDO::FETCH_ASSOC);
        

        
        $result->execute();

        
        $i = 0;
        $ordersList = array();
        while ($row = $result->fetch()) {
            $ordersList[$i]['id'] = $row['id'];
            $ordersList[$i]['user_name'] = $row['user_name'];
            $ordersList[$i]['user_phone'] = $row['user_phone'];
            $ordersList[$i]['totalPrice'] = $row['totalPrice'];
            $ordersList[$i]['town'] = $row['town'];
            $ordersList[$i]['adress'] = $row['adress'];
            $ordersList[$i]['email'] = $row['email'];
            $ordersList[$i]['mikud'] = $row['mikud'];
            $ordersList[$i]['products'] = $row['products'];
            $ordersList[$i]['num_order'] = $row['num_order'];
            $ordersList[$i]['status'] = $row['status'];
            $ordersList[$i]['date_of_order'] = $row['date_of_order'];
            $i++;
        }
        return $ordersList;
		}

		public static function getOrderById($id){
		
        $db = Db::getConnection();

        
        $sql = 'SELECT * FROM product_order WHERE id = :id';

        
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        
        $result->setFetchMode(PDO::FETCH_ASSOC);

        
        $result->execute();

        
        return $result->fetch();
		}

		public static function orderDelete($id){
		$db = Db::getConnection();

        
        $sql = 'DELETE FROM product_order WHERE id = :id';

        
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        return $result->execute();

		}

		public static function editOrder($id,$status){
			$db = Db::getConnection();
        
        $sql = "UPDATE product_order
            SET 
                status = :status
            WHERE id = :id";

        
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);
        return $result->execute();
		}
	}