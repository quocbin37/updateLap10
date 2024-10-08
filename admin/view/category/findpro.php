<h2>Search Results:</h2>
    <?php
     include_once __DIR__ . '/../../../model/da/helper.php';   
     include_once __DIR__ . '/../../../model/bl/product_db.php';
     
     $condition = Helper::input_value('search'); 
     if(!empty($condition)) 
     { 
        $products = Product_DB::findProducts($condition); 
     } 
     else {
        
     }
    ?>
   
    <table class="table table-striped table-hover">
        <tr>
            <th>Code</th>
            <th>Name</th>
            <th>Price</th>
        </tr>
        <?php
        if (!empty($products))
            foreach ($products as $row): ?>
                <tr>
                    <td><?php echo $row['productCode']; ?></td>
                    <td><?php echo $row['productName']; ?></td>
                    <td><?php echo $row['listPrice']; ?></td>
                </tr>
            <?php endforeach; ?>
    </table>
    <a href="<?php echo Helper::get_url('admin/?c=');?>">Quay Về</a>
