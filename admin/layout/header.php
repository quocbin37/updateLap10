<?php
include_once __DIR__ . '/../../model/da/helper.php';
include_once __DIR__ . '/../../model/bl/category_db.php';

?>
<header class="p-3 text-bg-dark">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">


            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="<?php echo Helper::get_url('admin/'); ?>" class="nav-link px-2 text-secondary">Home</a></li>
                <!-- <li><a href="#" class="nav-link px-2 text-white">Features</a></li>
                <li><a href="#" class="nav-link px-2 text-white">Pricing</a></li>
                <li><a href="#" class="nav-link px-2 text-white">FAQs</a></li>
                <li><a href="#" class="nav-link px-2 text-white">About</a></li> -->
            </ul>

            <form
                action="<?php echo Helper::get_url('admin/?c=findpro'); ?>"
                method="post"
                class="d-flex col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3"
                role="search">
                <!-- Input field with 'required' attribute to ensure it is not empty -->
                <input
                    type="text"
                    name="search"
                    class="form-control form-control-dark text-bg-dark me-2"
                    placeholder="Search..."
                    aria-label="Search"
                    required>
                <button type="submit" class="btn btn-outline-light">Find</button>
            </form>

        </div>
    </div>
</header>