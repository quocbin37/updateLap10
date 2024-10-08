<?php

include_once __DIR__ . '/../../../model/da/helper.php';
include_once __DIR__ . '/../../../model/bl/product_db.php';



if (!empty(Helper::input_value('id'))) {
  $product = Product_db::getProductByID(Helper::input_value('id'));
  if (Helper::is_submit('delete_product')) {
    if (product_db::deleteProduct($product)) {
      Helper::redirect('.');
    }
  }
}

?>
<div class="container mt-5">
  <div class="card">
    <div class="card-header">
      <h2>Confirm Deletion Information</h2>
    </div>
    <div class="card-body">
      <h3>Do you really want to delete this item?</h3>
      <p class="ml-4"><?php echo $product->getProductName(); ?></p>

      <div class="d-flex justify-content-between">
        <form action="" method="post" class="mr-2">
          <input type="hidden" name="action" value="delete_product" />
          <button type="submit" class="btn btn-danger">Yes</button>
        </form>
        <a href="http://localhost:3000/admin/?c" class="btn btn-secondary">
          No
        </a>
      </div>
    </div>
  </div>
</div>