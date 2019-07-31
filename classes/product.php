<?php
namespace aitsydney; // namespace of the class has to be the same
use aitsydney\Database;
class Product extends Database{
    public function __construct(){
        parent::__construct(); //calling our class parent and calling its construct method for database connection

    }
    public function getProducts(){
        $query = "SELECT  
        product.product_id,
        product.name,
        product.description,
        product.price,
        image.image_file_name AS image
        FROM product
        INNER JOIN product_image ON product.product_id = product_image.product_id
        INNER JOIN  image ON product_image.image_id = image.image_id";

        $statement = $this -> connection -> prepare($query );

        //after preparing query we can execute it
        if($statement -> execute()){
            //if execute
            $result = $statement -> get_result();
            //to rendor it, return result as array
            $product_array = array();
            while($row = $result -> fetch_assoc())//associative array
            {
                array_push($product_array,$row);
            }
            return $product_array;
        }
        //if database is down gives error

        
    }
} 
?>