<?php 
    include_once __DIR__ . '/../../model/da/helper.php';
?>
<div class="container">
   <div class="row">
      <!-- Left Column -->
      <div class="col-2">
         <?php include_once __DIR__ . '/left.php'; ?>
      </div>
      
      <!-- Right Column -->
      <div class="col-10">
         <?php
         $content = Helper::input_value('c'); 

         if(!empty($content)) 
         { 
            switch($content) 
            { 
                case "addpro":            
                   include_once __DIR__ . '/../view/category/add.php';
                   break; 
                case "editpro":     
                   include_once __DIR__ . '/../view/category/edit.php';
                   break; 
                case "deletepro":           
                   include_once __DIR__ . '/../view/category/delete.php';
                   break;              
                case "findpro":
                  include_once __DIR__ . '/../view/category/findpro.php';
                  break;
                case "quantitypro": 
                   include_once __DIR__ . '/../view/category/qualanlity.php';   
                   break; 
            } 
         } 
         else 
            include_once __DIR__ . '/../view/category/list.php';
         ?>
      </div>
   </div>
</div>
