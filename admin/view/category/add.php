<?php
include_once __DIR__ . '/../../../model/da/helper.php';
include_once __DIR__ . '/../../../model/bl/product_db.php';
include_once __DIR__ . '/../../../model/bl/category_db.php';

if (Helper::is_submit('add_products')) {
    $product = new Product();
    $product->setProductName(Helper::input_value('productName'));
    $product->setProductId(Helper::input_value('productID'));
    $product->setListPrice(Helper::input_value('listPrice'));
    $product->setcategotyID(Helper::input_value('categoryID'));

    // Validate required fields
    if (!empty($product->getProductName()) && !empty($product->getProductID()) && !empty($product->getListPrice()) && !empty($product->getcategotyID())) {
        if (Product_db::addProduct($product)) {
            Helper::redirect('.');
        } else {
            echo "<div class='alert alert-danger'>Failed to add product.</div>";
        }
    } else {
        echo "<div class='alert alert-warning'>All fields are required.</div>";
    }
}
?>

<h1 class="mt-4">Add Products</h1>
<form action="" method="post" id="action_form" class="container mt-4">
    <input type="hidden" name="action" value="add_products">

    <div class="mb-3">
        <label class="form-label" for="productID">Product Code:</label>
        <input type="text" class="form-control" name="productID" id="productID" required>
    </div>

    <div class="mb-3">
        <label class="form-label" for="productName">Product Name:</label>
        <input type="text" class="form-control" name="productName" id="productName" required>
    </div>

    <div class="mb-3">
        <label class="form-label" for="listPrice">Product Price:</label>
        <input type="number" class="form-control" name="listPrice" id="listPrice" required>
    </div>

    <div class="mb-3">
        <label class="form-label" for="categoryID">Category:</label>
        <select name="categoryID" id="categoryID" class="form-select" required>
            <option value="" disabled selected>Select a category</option>
            <?php
            $categories = Category_db::getCategories();
            if (!empty($categories)) :
                foreach ($categories as $category) : ?>
                    <option value="<?php echo $category->getId(); ?>">
                        <?php echo $category->getName(); ?>
                    </option>
                <?php endforeach; ?>
            <?php else : ?>
                <option value="" disabled>No categories available.</option>
            <?php endif; ?>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Add Product</button>
</form>