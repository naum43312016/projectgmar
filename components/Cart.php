<?php  

	class Cart{
		public static function addProduct($id,$selected_color){
			//id = integer
			$id = intval($id);

			$productsInCart = array();

            ////////////product colors
            $productsColor = array();
            if (isset($_SESSION['colors'])) {
                $productsColor = $_SESSION['colors'];
            }
			
			//add new color
            if (array_key_exists($id, $productsColor)) {
            $productsColor[$id] = $productsColor[$id] . " " . $selected_color;
        } else {
            //if not we add that color to array
             $productsColor[$id] = $selected_color;
        }
           
            $_SESSION['colors'] = $productsColor;


			//if session we add session products to array
			if (isset($_SESSION['products'])) {
				$productsInCart = $_SESSION['products'];
			}

			// check if we have that product
        if (array_key_exists($id, $productsInCart)) {
            $productsInCart[$id] ++;
        } else {
            //if not we add that product to array
            $productsInCart[$id] = 1;
        }

        //write our products to session
        $_SESSION['products'] = $productsInCart;

        return true;
		}

		public static function countItems()
    {
        //check products in session
        if (isset($_SESSION['products'])) {
            // if yes we return count of products
            $count = 0;
            foreach ($_SESSION['products'] as $id => $quantity) {
                $count = $count + $quantity;
            }
            return $count;
        } else {
            // if not return 0
            return 0;
        }
    }  

    	public static function getCartProducts(){
    		if (isset($_SESSION['products'])) {
    			return $_SESSION['products'];
    		}
    		return false;
    	}

    	public static function getTotalPrice($products)
    {
        
        $productsInCart = self::getCartProducts();

        //check total price
        $total = 0;
        if ($productsInCart) {
           
            foreach ($products as $item) {
                //product price * product count
                $total += $item['price'] * $productsInCart[$item['id']];
            }
        }

        return $total;
    }


    public static function getProducts()
    {
        if (isset($_SESSION['products'])) {
            return $_SESSION['products'];
        }
        return false;
    }

    public static function getColors()
    {
        if (isset($_SESSION['colors'])) {
            return $_SESSION['colors'];
        }
        return false;
    }


    public static function deleteProduct($id){
        //id = integer
         $id = intval($id);
         
        $productsInCart = self::getProducts();
        $colorsInCart = self::getColors();

        //delete product with id
        unset($productsInCart[$id]);
        unset($colorsInCart[$id]);
        
        //new
        $_SESSION['products'] = $productsInCart;
        $_SESSION['colors'] =  $colorsInCart;

    }

    //clean cart and order info
    public static function clear()
    {
        if (isset($_SESSION['products'])) {
            unset($_SESSION['products']);
        }

        if (isset($_SESSION['colors'])) {
            unset($_SESSION['colors']);
        }

        if (isset($_SESSION['order'])) {
            unset($_SESSION['order']);
        }
    }
	}
?>