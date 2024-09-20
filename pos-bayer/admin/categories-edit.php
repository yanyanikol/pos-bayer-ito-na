<?php include('includes/header.php'); ?>

<div class="container-fluid px-4">
    <div class="card mt-4 shadow-sm">
        <div class="card-header">
            <h4 class="mb-0">Edit Item
                <a href="categories.php" class="btn btn-primary float-end">Back</a>
            </h4>
        </div>
        <div class="card-body">
            <?php alertMessage(); ?>
            <form action="code.php" method="POST">

                <?php
                $parmValue = checkParamId('id');

                // Ensure parmValue is numeric and valid
                if (!is_numeric($parmValue)) {
                    echo '<h5>Invalid ID provided.</h5>';
                    exit; // Stop further execution
                }

                $category = getById('categories', $parmValue);
                if ($category['status'] == 200) {
                ?>
                    <input type="hidden" name="categoryId" value="<?= $category['data']['id']; ?>">

                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="">Name</label>
                            <input type="text" name="name" value="<?= htmlspecialchars($category['data']['name']); ?>" required class="form-control" />
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">Description</label>
                            <textarea name="description" class="form-control" rows="3"><?= htmlspecialchars($category['data']['description']); ?></textarea>
                        </div>

                        <div class="col-md-6">
                            <label>Status (Unchecked=Visible, Checked=Hidden)</label>
                            <br/>
                            <input type="checkbox" name="status" <?= $category['data']['status'] ? 'checked' : ''; ?> style="width:30px;height:30px;">
                        </div>

                        <div class="col-md-6 mb-3 text-end">
                            <br/>
                            <button type="submit" name="updateCategory" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                <?php
                } else {
                    echo '<h5>' . htmlspecialchars($category['message']) . '</h5>';
                }
                ?>
            </form>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>
