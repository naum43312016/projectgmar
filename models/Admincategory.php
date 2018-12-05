<?php

class Admincategory{
	public static function getCategoriesList(){
		$db = Db::getConnection();

        $sql = 'SELECT * FROM category ORDER BY id ASC ';

        $result = $db->prepare($sql);
        
        $result->setFetchMode(PDO::FETCH_ASSOC);
        
        $result->execute();

        $i = 0;
        $categorylist = array();
        while ($row = $result->fetch()) {
            $categorylist[$i]['id'] = $row['id'];
            $categorylist[$i]['name'] = $row['name'];
            $categorylist[$i]['sort_order'] = $row['sort_order'];
            $i++;
        }
        return $categorylist;
	}

	public static function addCategory($cat_name,$cat_sort){
		$db = Db::getConnection();

        
        $sql = 'INSERT INTO category (name, sort_order) '
                . 'VALUES (:name, :sort_order)';


        $result = $db->prepare($sql);
        $result->bindParam(':name', $cat_name, PDO::PARAM_STR);
        $result->bindParam(':sort_order', $cat_sort, PDO::PARAM_INT);
        
        return $result->execute();
	}

	public static function getCategoryById($id){
		
        $db = Db::getConnection();

        
        $sql = 'SELECT * FROM category WHERE id = :id';

        
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        
        $result->setFetchMode(PDO::FETCH_ASSOC);

        
        $result->execute();

        
        return $result->fetch();
		}


	public static function categoryDelete($id){
		$db = Db::getConnection();

        
        $sql = 'DELETE FROM category WHERE id = :id';

    
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        return $result->execute();

		}

	public static function categoryEdit($id,$category_sort,$category_name){
			$db = Db::getConnection();
        
        $sql = "UPDATE category
            SET 
                name = :name,
                sort_order = :sort_order
            WHERE id = :id";

        
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $category_name, PDO::PARAM_STR);
        $result->bindParam(':sort_order', $category_sort, PDO::PARAM_INT);
        return $result->execute();
		}
}