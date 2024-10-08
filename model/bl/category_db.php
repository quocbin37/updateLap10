<?php
include_once __DIR__ . '/../da/database.php';

class Category_db extends Database
{

    public static function getCategories()
    { 
      
       $sql = "select * from categories";
      
        if (!empty(self::db_get_list($sql))) {
            foreach (self::db_get_list($sql) as $row) {
                $category = new Category();
                $category->setId($row['categoryID']);
                $category->setName($row['categoryName']);
                $categorys[] = $category;
              
            }
            return $categorys;
        }
        return false;
    }
    // public static function getCategories($limit, $offset)
    // { 
    //     // Xây dựng câu lệnh SQL với LIMIT và OFFSET
    //     $sql = "SELECT * FROM categories LIMIT $limit OFFSET $offset";
    
    //     // Thực hiện truy vấn và lấy danh sách
    //     $rows = self::db_get_list($sql);
    //     if (!empty($rows)) {
    //         $categories = [];
    //         foreach ($rows as $row) {
    //             $category = new Category();
    //             $category->setId($row['categoryID']);
    //             $category->setName($row['categoryName']);
    //             $categories[] = $category;
    //         }
    //         return $categories;
    //     }
    //     return false; // Trả về false nếu không có danh mục nào
    // }
    


    // public static function getCategoryByID($categoryid)
    // {
    //     $sql = "select * from categories where categoryID=:categoryID";
    //     $params = ['categoryID' => $categoryid];
    //     $row = self::db_get_row($sql, $params);
    //     if (!empty($row)) {
    //         $category = new Category();
    //         $category->setId($row['categoryID']);
    //         $category->setName($row['categoryName']);
    //         return $category;
    //     }
    //     return false;
    // }

    // public static function addCategory($category) {
    //     $params = [
    //         "categoryName" => $category->getName()
    //     ];
    //     $sql = "INSERT INTO categories VALUES (:categoryName)";


    //     if (self::db_execute($sql, $params)) {
    //         return true;
    //     } else {
    //         // Log the error
    //         error_log('Failed to add category: ' . print_r($params, true));
    //         return false;
    //     }
    // }
    // public static function addCategory($category) {
    //     $params = [
    //         "categoryName" => $category->getName()
    //     ];
    //     $sql = "INSERT INTO `lab05`.`categories` (`categoryName`) VALUES (:categoryName)";

    //     try {
    //         if (self::db_execute($sql, $params)) {
    //             return true;
    //         } else {
    //             // Log the error
    //             error_log('Failed to add category: ' . print_r($params, true));
    //             return false;
    //         }
    //     } catch (Exception $e) {
    //         // Log the exception
    //         echo 'Exception occurred while adding category: ' . $e->getMessage();
    //         return false;
    //     }
    // }
    public static function addCategory($category)
    {
        {
            // Prepare the parameters and the query
            $params = [
                "categoryName" => $category->getName()
            ];
            
            // Extract the category name and use it in the query
            $bin = $category->getName();
            $sql = "INSERT INTO `lab05`.`categories` (`categoryName`) VALUES (:categoryName)";
            
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
                        error_log('Failed to add category: ' . print_r($params, true));
                        return false;
                    }
                } else {
                    error_log('Database connection is null.');
                    return false;
                }
                
            } catch (Exception $e) {
                // Log any exceptions that occur
                error_log('Exception occurred while adding category: ' . $e->getMessage());
                return false;
            }
        }
        
    }
   



    public static function updateCategeory($category)
    {
        $sql = "update categories set categoryName=:categoryName where categoryID=:categoryID";
        $params = [
            "categoryID" => $category->getId(),
            "categoryName" => $category->getName()
        ];
        if (self::db_execute($sql, $params))
            return true;
        else
            return false;
    }
    public static function deleteCategeory($category)
    {
        $sql = "delete from categories where categoryID=:categoryID";
        $params = [
            "categoryID" => $category->getId()
        ];
        if (self::db_execute($sql, $params))
            return true;
        else
            return false;
    }
}
