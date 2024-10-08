<?php
include_once __DIR__ . '/../../model/da/helper.php';
include_once __DIR__ . '/../../model/bl/category_db.php';
?>
<h1 style="color:orange">Categories</h1>
<ul>
    <?php
    // Fetch categories
    $categories = Category_db::getCategories();
    if (!empty($categories)) :
    ?>
        <?php foreach ($categories as $category) : ?>
            <li style="
                margin-top: 40px; 
                list-style: none; 
                margin-left: 30px; 
                font-size: large;
            ">
                <!-- Link to search page with the category name passed as a GET parameter -->
                <a href="<?php echo Helper::get_url('admin/?c=findpro&category=' . urlencode($category->getName())); ?>"
                    style="color: blue; text-decoration: none;">
                    <?php echo $category->getName(); ?>
                </a>
            </li>
        <?php endforeach; ?>
    <?php
    else :
        echo "No categories available.";
    endif;
    ?>
</ul>

<!-- Link to statistics page -->
<a href="<?php echo Helper::get_url('admin/?c=quantitypro'); ?>" style="text-decoration: none;">
    <h1 style="margin-top: 30px; color:orange">Statistics</h1>
</a>

<!-- PHP Logic to handle the search by category -->
<?php
if (isset($_GET['category'])) {
    $categoryName = urldecode($_GET['category']);



    $products = Product_DB::findProducts($categoryName);
}
?>