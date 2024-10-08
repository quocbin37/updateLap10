<?php
include_once __DIR__ . '/../../../model/da/helper.php';
include_once __DIR__ . '/../../../model/bl/product_db.php';
if (!empty(Helper::input_value('id'))) {
    $product = Product_db::getProductByID(Helper::input_value('id'));
    if (Helper::is_submit('editpro')) {
        $product->setProductName(Helper::input_value('name'));
        $product->setProductCode(Helper::input_value('code'));
        $product->setListPrice(Helper::input_value('price'));
        if (Product_db::updateProduct($product)) {
            Helper::redirect('.');
        }
    }
}

?>

<h1>Edit product</h1>
<form action="" method="post" id="action_form" class="container mt-4">
    <input type="hidden" name="action" value="editpro">

    <div class="mb-3">
        <label for="name" class="form-label">Product Name:</label>
        <input type="text" class="form-control" id="name" name="name" value="<?php echo $product->getProductName(); ?>">
    </div>

    <div class="mb-3">
        <label for="code" class="form-label">Product Code:</label>
        <input type="text" class="form-control" id="code" name="code" value="<?php echo $product->getProductId(); ?>">
    </div>

    <div class="mb-3">
        <label for="price" class="form-label">Product List Price:</label>
        <input type="text" class="form-control" id="price" name="price" value="<?php echo $product->getListPrice(); ?>">
    </div>

    <div class="mb-3">
        <input type="submit" class="btn btn-primary" value="Update">
    </div>
</form>

<p><a href="<?php echo Helper::get_url('admin/'); ?>">View product List</a></p>