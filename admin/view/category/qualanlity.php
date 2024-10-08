<?php
$result = Product_DB::getStatistics();
?>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          <h2 class="text-center">Statistic of Products</h2>
        </div>
        <div class="card-body">
          <table class="table table-striped table-bordered text-center">
            <thead class="thead-dark">
              <tr>
                <th>Category Name</th>
                <th>Quantity</th>
              </tr>
            </thead>
            <tbody>
              <?php
              if (!empty($result))
                foreach ($result as $row) : ?>
                <tr>
                  <td><?php echo $row['categoryName']; ?></td>
                  <td><?php echo $row['quantity']; ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>