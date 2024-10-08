<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../pulic/css/main.css">
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body>
 <?php 
    include_once './../model/da/database.php'; 
    include_once '../model/da/helper.php'; 
    include_once './../model/da/database.php'; 
    include_once '../model/da/helper.php'; 
    include_once '../model/bl/category.php'; 
    include_once '../model/bl/category_db.php';
    include_once '../model/bl/product_db.php';
    include_once '../model/bl/category_db.php';
    
     
  //  include_once('./../model/da/helper.php');

      $db = new Database(); 
?> 
<base href="<?php echo Helper::get_url('admin/'); ?>"> 
<?php  
  $view = filter_input(INPUT_GET, 'v'); 
  $action = filter_input(INPUT_GET, 'a');
if (empty($view) || empty($action)) {
    $view = 'common';
    $action = 'admin';
}
$path = 'view/' . $view . '/' . $action . '.php';
if (file_exists($path)) {
    include_once($path);
} else {
    header('Location:../404.php');
}
?>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</body>

</html>