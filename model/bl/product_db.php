<?php
include_once __DIR__ . '/../da/database.php';
include_once __DIR__ . '/product.php';

class Product_db extends Database
{


    public static function getProduct($limit, $offset)
    {
        // Xây dựng câu lệnh SQL với LIMIT và OFFSET
        $sql = "SELECT * FROM products LIMIT $limit OFFSET $offset";

        // Thực hiện truy vấn và lấy danh sách
        $rows = self::db_get_list($sql);
        if (!empty($rows)) {
            $products = [];
            foreach ($rows as $row) {
                $product = new Product();
                $product->setProductId($row['productID']);
                $product->setProductName($row['productName']);
                $product->setListPrice($row['listPrice']);
                $products[] = $product;
            }
            return $products;
        }

        return false; // Trả về false nếu không có danh mục nào
    }

    public static function getProductByID($Productid)
    {
        $sql = "select * from products where ProductID=:ProductID";
        $params = ['ProductID' => $Productid];
        $row = self::db_get_row($sql, $params);
        if (!empty($row)) {
            $product = new Product();
            $product->setProductId($row['productID']);
            $product->setProductName($row['productName']);
            $product->setListPrice($row['listPrice']);
            $product->setcategotyID($row['categoryID']);
            return $product;
        }
        return false;
    }

    public static function updateProduct($product)
{
    $sql = "update products set productName=:productName, listPrice=:listPrice, productCode=:productCode where productID=:productID";
    $params = [
        "productID" => $product->getProductID(),
        "productName" => $product->getProductName(),
        "listPrice" => $product->getListPrice(),
        "productCode" => $product->getProductCode() // Fixed typo here
    ];

    if (self::db_execute($sql, $params))
        return true;
    else
        return false;
}

    public static function deleteProduct($product)
    {
        $sql = "delete from products where productID=:productID";
        $params = [
            "productID" => $product->getProductId()
        ];
        if (self::db_execute($sql, $params))
            return true;
        else
            return false;
    }
    public static function addProduct($product)
    { {
            // Prepare the parameters and the query
            $params = [
                "productCode" => $product->getProductID(),
                "productName" => $product->getProductName(),
                "listPrice" => $product->getListPrice(),
                "categoryID" => $product->getcategotyID()

            ];


            $sql = "INSERT INTO `lab05`.`products` (`productCode`, `productName`, `listPrice`, `categoryID`) 
        VALUES (:productCode, :productName, :listPrice, :categoryID)";

            try {

                // Display the SQL query for debugging (with placeholders)
                //  echo $sql;
                $con = Database::db_connect();
                // Check if the connection is available
                if (!is_null($con)) {

                    // Prepare the SQL statement
                    $stmt = $con->prepare($sql);

                    // Execute the query with bound parameters
                    $stmt->execute($params);

                    // Check if rows were affected (successful insert)
                    if ($stmt->rowCount() > 0) {
                        $stmt->closeCursor(); // Free the cursor
                        return true;
                    } else {
                        error_log('Failed to add product: ' . print_r($params, true));
                        return false;
                    }
                } else {
                    error_log('Database connection is null.');
                    return false;
                }
            } catch (Exception $e) {
                // Log any exceptions that occur
                error_log('Exception occurred while adding product: ' . $e->getMessage());
                return false;
            }
        }
    }
    public static function findProducts($condition) 
    { 
       $sql = "call timkiem(:condition)"; 
       $params = ['condition'=>$condition]; 
       if(!empty(self::db_get_list_condition($sql,$params))) 
       { 
          return self::db_get_list_condition($sql,$params); 
       } 
       return false; 
    }

    public static function getStatistics() 
   { 
      $sql = "select * from v_quantity"; 
      if(!empty(self::db_get_list($sql))) 

      { 
         return self::db_get_list($sql); 
      } 
      return false; 
   } 
}
