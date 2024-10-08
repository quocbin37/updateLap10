<?php
include_once __DIR__ . '/../../../model/da/helper.php';
include_once __DIR__ . '/../../../model/bl/product_db.php';


$limit = 5;

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($page < 1) $page = 1;

$offset = ($page - 1) * $limit;

// Lấy danh mục với phân trang
$products = Product_db::getProduct($limit, $offset);

// Tính tổng số danh mục
$total_products = Product_db::db_get_total("products");

// Tính tổng số trang
$total_pages = ceil($total_products / $limit);

// Tính số hàng còn thiếu để đạt limit
$remaining_rows = $limit - count($products);
?>

<header>
    <h1>List of Product</h1>
</header>

<table id="dataTable" class="table table-striped table-hover">
    <thead>
        <tr>
            <th class="col-1">ID</th>
            <th class="col-3">Name</th>
            <th class="col-3">List Price</th>
            <th class="col-3"></th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($products)) : ?>
            <?php foreach ($products as $product) : ?>
                <tr>
                    <td><?php echo $product->getProductId(); ?></td>
                    <td><?php echo $product->getProductName(); ?></td>
                    <td><?php echo $product->getListPrice() ?></td>
                    <td>
                        <a href="<?php echo Helper::get_url('admin/?c=deletepro&id=' . $product->getProductId()); ?>"> <button class="btn btn-danger">Xóa</button></a>

                        <a href="<?php echo Helper::get_url('admin/?c=editpro&id=' . $product->getProductId()); ?>"> <button class="btn btn-success">Sửa</button></a>
                    </td>
                </tr>
            <?php endforeach; ?>

            <!-- Thêm hàng trống nếu còn thiếu -->
            <?php for ($i = 0; $i < $remaining_rows; $i++) : ?>
                <tr>
                    <td>&nbsp;</td> <!-- Ô trống -->
                    <td>&nbsp;</td> <!-- Ô trống -->
                    <td>&nbsp;</td> <!-- Ô trống -->
                    <td>&nbsp;</td> <!-- Ô trống -->
                </tr>
            <?php endfor; ?>

        <?php else : ?>
            <tr>
                <td colspan="3">No products available.</td>
            </tr>
        <?php endif; ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="3">
                <!-- Nút Add products vẫn luôn hiện dưới cùng -->
                <a href="<?php echo Helper::get_url('admin/?c=addpro'); ?>">
                    <button class="btn btn-light">Add products</button>
                </a>
                <!-- Pagination navigation -->
                <nav aria-label="Page navigation">
                    <ul class="pagination">
                        <!-- Previous Button -->
                        <?php if ($page > 1): ?>
                            <li style="margin: 0 20px;">
                                <a href="?page=<?= $page - 1; ?>">Previous</a>
                            </li>
                        <?php endif; ?>

                        <!-- Page Numbers -->
                        <?php
                        $max_displayed_pages = 3; // Number of pages to display before and after the current page
                        $start_page = max(1, $page - $max_displayed_pages); // Ensure the start page is at least 1
                        $end_page = min($total_pages, $page + $max_displayed_pages); // Ensure the end page does not exceed total pages

                        for ($i = $start_page; $i <= $end_page; $i++): ?>
                            <li style="margin: 0 20px;" class="<?= $i == $page ? 'active' : ''; ?>">
                                <a href="?page=<?= $i; ?>"><?= $i; ?></a>
                            </li>
                        <?php endfor; ?>

                        <!-- Ellipsis if needed -->
                        <?php if ($end_page < $total_pages): ?>
                            <li style="margin: 0 20px;">...</li>
                        <?php endif; ?>

                        <!-- Last Page Link -->
                        <?php if ($end_page < $total_pages): ?>
                            <li style="margin: 0 20px;">
                                <a href="?page=<?= $total_pages; ?>"><?= $total_pages; ?></a>
                            </li>
                        <?php endif; ?>

                        <!-- Next Button -->
                        <?php if ($page < $total_pages): ?>
                            <li style="margin: 0 20px;">
                                <a href="?page=<?= $page + 1; ?>">Next</a>
                            </li>
                        <?php endif; ?>
                    </ul>

                </nav>
            </td>
        </tr>
    </tfoot>

</table>