<?php

class Adminproduct{
	public static function getProductList(){
		$db = Db::getConnection();

        
        $sql = 'SELECT * FROM product ORDER BY id DESC ';

        
        $result = $db->prepare($sql);

        
        $result->setFetchMode(PDO::FETCH_ASSOC);
  
        $result->execute();

        $i = 0;
        $products = array();
        while ($row = $result->fetch()) {
            $products[$i]['id'] = $row['id'];
            $products[$i]['name'] = $row['name'];
            $products[$i]['price'] = $row['price'];
            $products[$i]['brand'] = $row['brand'];
            $products[$i]['color_name'] = $row['color_name'];
            $products[$i]['color_name1'] = $row['color_name1'];
            $products[$i]['color_name2'] = $row['color_name2'];
            $products[$i]['color_name3'] = $row['color_name3'];
            $products[$i]['color_name4'] = $row['color_name4'];
            $products[$i]['color_name5'] = $row['color_name5'];
            $products[$i]['description'] = $row['description'];
            $products[$i]['stock'] = $row['stock'];
            $products[$i]['was_bought'] = $row['was_bought'];
            $products[$i]['was_see'] = $row['was_see'];
            $products[$i]['likes'] = $row['likes'];
            $products[$i]['status'] = $row['status'];
            $i++;
        }
        return $products;
	}

	public static function saveProduct($new_product_name,$new_product_price,$new_product_category,$new_product_brand,$new_product_stock,$new_product_rank,$new_product_status,$new_product_description,$innerdir_video,
							$new_product_color1,$new_product_color2,$new_product_color3,$new_product_color4,$new_product_color5,$new_product_color6,
							$innerdir_image,$innerdir_image0,$innerdir_image1,$innerdir_image2,$innerdir_image3,$innerdir_image4,$innerdir_image5,$innerdir_image6)
	{
		$new_product_price = intval($new_product_price);
		$new_product_category = intval($new_product_category);
		$new_product_status = intval($new_product_status);

		$db = Db::getConnection();

		$sql = 'INSERT INTO product (name, category_id, price, rank, brand, stock, video, image,  image0, image1, image2, image3, image4,  image5,  image6, color_name, color_name1, color_name2, color_name3, color_name4, color_name5, description, status) '
                . 'VALUES (:new_product_name, :new_product_category, :new_product_price, :new_product_rank, :new_product_brand, :new_product_stock,
                :innerdir_video, :innerdir_image, :innerdir_image0, :innerdir_image1, :innerdir_image2, :innerdir_image3, :innerdir_image4, :innerdir_image5, :innerdir_image6, :new_product_color1, :new_product_color2, :new_product_color3, :new_product_color4, :new_product_color5, :new_product_color6, :new_product_description, :new_product_status)';

        $result = $db->prepare($sql);
        $result->bindParam(':new_product_name', $new_product_name, PDO::PARAM_STR);//
        $result->bindParam(':new_product_category', $new_product_category, PDO::PARAM_INT);//
        $result->bindParam(':new_product_price', $new_product_price, PDO::PARAM_INT);//
        $result->bindParam(':new_product_rank', $new_product_rank, PDO::PARAM_STR);//
        $result->bindParam(':new_product_brand', $new_product_brand, PDO::PARAM_STR);
        $result->bindParam(':new_product_stock', $new_product_stock, PDO::PARAM_INT);
        $result->bindParam(':innerdir_video', $innerdir_video, PDO::PARAM_STR);
        $result->bindParam(':innerdir_image', $innerdir_image, PDO::PARAM_STR);
        $result->bindParam(':innerdir_image0', $innerdir_image0, PDO::PARAM_STR);
        $result->bindParam(':innerdir_image1', $innerdir_image1, PDO::PARAM_STR);
        $result->bindParam(':innerdir_image2', $innerdir_image2, PDO::PARAM_STR);
        $result->bindParam(':innerdir_image3', $innerdir_image3, PDO::PARAM_STR);
        $result->bindParam(':innerdir_image4', $innerdir_image4, PDO::PARAM_STR);
        $result->bindParam(':innerdir_image5', $innerdir_image5, PDO::PARAM_STR);
        $result->bindParam(':innerdir_image6', $innerdir_image6, PDO::PARAM_STR);
        $result->bindParam(':new_product_color1', $new_product_color1, PDO::PARAM_STR);
        $result->bindParam(':new_product_color2', $new_product_color2, PDO::PARAM_STR);
        $result->bindParam(':new_product_color3', $new_product_color3, PDO::PARAM_STR);
        $result->bindParam(':new_product_color4', $new_product_color4, PDO::PARAM_STR);
        $result->bindParam(':new_product_color5', $new_product_color5, PDO::PARAM_STR);
        $result->bindParam(':new_product_color6', $new_product_color6, PDO::PARAM_STR);
        $result->bindParam(':new_product_description', $new_product_description, PDO::PARAM_STR);
        $result->bindParam(':new_product_status', $new_product_status, PDO::PARAM_INT);
        
        return $result->execute();
	}


	public static function productDelete($id,$innerdir_image,$innerdir_image0,$innerdir_image1,$innerdir_image2,$innerdir_image3,$innerdir_image4,$innerdir_image5,$innerdir_image6){

        //delete foto and video
        if (!empty($innerdir_image)) {
            unlink($_SERVER['DOCUMENT_ROOT'] . $innerdir_image);
        }
        if (!empty($innerdir_video)) {
            unlink($_SERVER['DOCUMENT_ROOT'] . $innerdir_video);
        }
        for ($i=0; $i <=6 ; $i++) { 
            if (!empty(${'innerdir_image' . $i})) {
                unlink($_SERVER['DOCUMENT_ROOT'] . ${'innerdir_image' . $i});
            }
        }

		$db = Db::getConnection();

        
        $sql = 'DELETE FROM product WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        return $result->execute();

		}

	public static function galleryDelete($id,$innerdir_image0,$innerdir_image1,$innerdir_image2,$innerdir_image3,$innerdir_image4,$innerdir_image5,$innerdir_image6){
		$db = Db::getConnection();
        
        $sql = "UPDATE product
            SET 
                image0 = :image0,
                image1 = :image1,
                image2 = :image2,
                image3 = :image3,
                image4 = :image4,
                image5 = :image5,
                image6 = :image6
            WHERE id = :id";

        
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':image0', $innerdir_image0, PDO::PARAM_STR);
        $result->bindParam(':image1', $innerdir_image1, PDO::PARAM_STR);
        $result->bindParam(':image2', $innerdir_image2, PDO::PARAM_STR);
        $result->bindParam(':image3', $innerdir_image3, PDO::PARAM_STR);
        $result->bindParam(':image4', $innerdir_image4, PDO::PARAM_STR);
        $result->bindParam(':image5', $innerdir_image5, PDO::PARAM_STR);
        $result->bindParam(':image6', $innerdir_image6, PDO::PARAM_STR);
        return $result->execute();
	}

	public static function updateProduct($id,$new_product_name,$new_product_price,$new_product_category,$new_product_brand,$product_stock,$new_product_rank,$new_product_status,$new_product_description,$innerdir_video,
							$new_product_color1,$new_product_color2,$new_product_color3,$new_product_color4,$new_product_color5,$new_product_color6,
							$innerdir_image,$innerdir_image0,$innerdir_image1,$innerdir_image2,$innerdir_image3,$innerdir_image4,$innerdir_image5,$innerdir_image6)
	{
		$new_product_price = intval($new_product_price);
		$new_product_category = intval($new_product_category);
		$new_product_status = intval($new_product_status);

		$db = Db::getConnection();

		$sql = "UPDATE product
            SET 
                name = :new_product_name,
                category_id = :new_product_category,
                price = :new_product_price,
                rank = :new_product_rank,
                brand = :new_product_brand,
                stock = :product_stock,
                video = :innerdir_video,
                image = :innerdir_image,
                image0 = :innerdir_image0,
                image1 = :innerdir_image1,
                image2 = :innerdir_image2,
                image3 = :innerdir_image3,
                image4 = :innerdir_image4,
                image5 = :innerdir_image5,
                image6 = :innerdir_image6,
                color_name = :new_product_color1,
                color_name1 = :new_product_color2,
                color_name2 = :new_product_color3,
                color_name3 = :new_product_color4,
                color_name4 = :new_product_color5,
                color_name5 = :new_product_color6,
                description = :new_product_description,
                status = :new_product_status
            WHERE id = :id";

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':new_product_name', $new_product_name, PDO::PARAM_STR);//
        $result->bindParam(':new_product_category', $new_product_category, PDO::PARAM_INT);//
        $result->bindParam(':new_product_price', $new_product_price, PDO::PARAM_INT);//
        $result->bindParam(':new_product_rank', $new_product_rank, PDO::PARAM_STR);//
        $result->bindParam(':new_product_brand', $new_product_brand, PDO::PARAM_STR);
        $result->bindParam(':product_stock', $product_stock, PDO::PARAM_INT);
        $result->bindParam(':innerdir_video', $innerdir_video, PDO::PARAM_STR);
        $result->bindParam(':innerdir_image', $innerdir_image, PDO::PARAM_STR);
        $result->bindParam(':innerdir_image0', $innerdir_image0, PDO::PARAM_STR);
        $result->bindParam(':innerdir_image1', $innerdir_image1, PDO::PARAM_STR);
        $result->bindParam(':innerdir_image2', $innerdir_image2, PDO::PARAM_STR);
        $result->bindParam(':innerdir_image3', $innerdir_image3, PDO::PARAM_STR);
        $result->bindParam(':innerdir_image4', $innerdir_image4, PDO::PARAM_STR);
        $result->bindParam(':innerdir_image5', $innerdir_image5, PDO::PARAM_STR);
        $result->bindParam(':innerdir_image6', $innerdir_image6, PDO::PARAM_STR);
        $result->bindParam(':new_product_color1', $new_product_color1, PDO::PARAM_STR);
        $result->bindParam(':new_product_color2', $new_product_color2, PDO::PARAM_STR);
        $result->bindParam(':new_product_color3', $new_product_color3, PDO::PARAM_STR);
        $result->bindParam(':new_product_color4', $new_product_color4, PDO::PARAM_STR);
        $result->bindParam(':new_product_color5', $new_product_color5, PDO::PARAM_STR);
        $result->bindParam(':new_product_color6', $new_product_color6, PDO::PARAM_STR);
        $result->bindParam(':new_product_description', $new_product_description, PDO::PARAM_STR);
        $result->bindParam(':new_product_status', $new_product_status, PDO::PARAM_INT);
        
        return $result->execute();
	}

    public static function getProductsStock(){
        $db = Db::getConnection();

        
        $sql = 'SELECT * FROM product WHERE stock <=3';

        
        $result = $db->prepare($sql);

        
        $result->setFetchMode(PDO::FETCH_ASSOC);
  
        $result->execute();

        $i = 0;
        $products = array();
        while ($row = $result->fetch()) {
            $products[$i]['id'] = $row['id'];
            $products[$i]['name'] = $row['name'];
            $products[$i]['stock'] = $row['stock'];
            $products[$i]['status'] = $row['status'];
            $i++;
        }
        return $products;
    }
}