<?php include('includes/header.php'); ?>

<div class="container-fluid px-4">
    <div class="card mt-4 shadow-sm">
        <div class="card-header">
            <h4 class="mb-0">Products
                <a href="products-create.php" class="btn btn-primary float-end">Add Product</a>
            </h4>
        </div>
        <div class="card-body">
            <?php alertMessage(); ?>

            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $products = getAll('products');
                        if (!$products) {
                            echo '<h4>Something Went Wrong!</h4>';
                            return false;
                        }
                        if (mysqli_num_rows($products) > 0) {
                        ?>

                        <?php
                        foreach ($products as $item) :
                        ?>
                        <tr>
                            <td><?= $item['id'] ?></td>
                            <td>
                                <img src="../<?= $item['image'] ?>" style="width:50px;height:50px;" alt="img">
                            </td>
                            <td><?= $item['name'] ?></td>
                            <td>
                                <?php
                                if ($item['status'] == 1) {
                                    echo '<span class="badge bg-danger">Hidden</span>';
                                } else {
                                    echo '<span class="badge bg-primary">Visible</span>';
                                }
                                ?>
                            </td>
                            <td>
                                <a href="products-edit.php?id=<?= $item['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                <a href="products-delete.php?id=<?= $item['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        <?php
                        } else {
                        ?>
                        <tr>
                            <td colspan="4">No Record Found</td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>
