<?php

    class Product
	{
		public static function getRankProducts($count)
    {
        //db connection
        $db = Db::getConnection();

        $sql = 'SELECT * FROM product '
                . 'WHERE status = "1" ORDER BY rank DESC '
                . 'LIMIT :count';

        
        $result = $db->prepare($sql);
        $result->bindParam(':count', $count, PDO::PARAM_INT);

        //get data by array
        $result->setFetchMode(PDO::FETCH_ASSOC);
        
        //execute the command
        $result->execute();

        //get and return rresult
        $i = 0;
        $productsList = array();
        while ($row = $result->fetch()) {
            $productsList[$i]['id'] = $row['id'];
            $productsList[$i]['name'] = $row['name'];
            $productsList[$i]['price'] = $row['price'];
            $productsList[$i]['image'] = $row['image'];
            $i++;
        }
        return $productsList;
    }

    	public static function getProductsListByCategory($categoryId, $page)
    {
        $limit = 6;

        $offset = ($page - 1) * $limit;


        $db = Db::getConnection();

        
        $sql = "SELECT * FROM product 
                 WHERE status = '1' AND category_id = :category_id
                 ORDER BY rank DESC LIMIT :limit OFFSET :offset";

        $result = $db->prepare($sql);
        $result->bindParam(':category_id', $categoryId, PDO::PARAM_INT);
        $result->bindParam(':limit', $limit, PDO::PARAM_INT);
        $result->bindParam(':offset', $offset, PDO::PARAM_INT);

        $result->execute();

        $i = 0;
        $products = array();
        while ($row = $result->fetch()) {
            $products[$i]['id'] = $row['id'];
            $products[$i]['name'] = $row['name'];
            $products[$i]['price'] = $row['price'];
            $products[$i]['image'] = $row['image'];
            $i++;
        }
        return $products;
    }

    public static function getProductById($id){
        
        $db = Db::getConnection();

        
        $sql = 'SELECT * FROM product WHERE id = :id';

        
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        
        $result->setFetchMode(PDO::FETCH_ASSOC);

       
        $result->execute();

        
        return $result->fetch();
    }


    public static function getProductsById($idsArray)
    {
        // db
        $db = Db::getConnection();

        // array to string for query
        $idsString = implode(',', $idsArray);

        // Текст запроса к БД
        $sql = "SELECT * FROM product WHERE  id IN ($idsString)";

        $result = $db->query($sql);

        //data array
        $result->setFetchMode(PDO::FETCH_ASSOC);

        $i = 0;
        $products = array();
        while ($row = $result->fetch()) {
            $products[$i]['id'] = $row['id'];
            $products[$i]['code'] = $row['code'];
            $products[$i]['name'] = $row['name'];
            $products[$i]['price'] = $row['price'];
            $products[$i]['color_name'] = $row['color_name'];
            $i++;
        }
        return $products;
    }

    public static function countItemsInCategory($categoryId){
            $db = Db::getConnection();

            $query=$db->query("SELECT id FROM product WHERE category_id = '$categoryId'");
            $count=$query->rowCount();
            return $count;
    }

    public static function productLike($id,$likes){
        $db = Db::getConnection();
        
        $sql = "UPDATE product
            SET 
                likes = :likes
            WHERE id = :id";

        
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':likes', $likes, PDO::PARAM_INT);
        return $result->execute();
        }

    public static function getStockOfProduct($id){
        $db = Db::getConnection();

            $result = $db->query("SELECT stock FROM product WHERE id = '$id'");

            while ($row = $result->fetch()) {
                $stock_of_pr = $row['stock'];
            }
            return $stock_of_pr;
    }

    public static function getBuyOfProduct($id){
        $db = Db::getConnection();

            $result = $db->query("SELECT was_bought FROM product WHERE id = '$id'");

            while ($row = $result->fetch()) {
               $buy = $row['was_bought'];
            }
            return $buy;
    }

    public static function stockProduct($id,$quantity){
        $db = Db::getConnection();
        
        $stock = self::getStockOfProduct($id);
        $stock = intval($stock);
        $stock = $stock - $quantity;
        $buy_count = self::getBuyOfProduct($id);
        $buy_count = intval($buy_count);
        $buy_count = $buy_count + $quantity;

        $sql = "UPDATE product
            SET 
                was_bought = :buy_count,
                stock = :stock
            WHERE id = :id";

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':stock', $stock, PDO::PARAM_INT);
        $result->bindParam(':buy_count', $buy_count, PDO::PARAM_INT);
        return $result->execute();
        }

    public static function statOfProduct($id){
        $db = Db::getConnection();

        $sql = "UPDATE product
            SET 
                was_see = was_see + 1
            WHERE id = :id";

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
        }
}