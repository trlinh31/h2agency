<?php
require_once('../../../controllers/product.controller.php');
$productController = new ProductController();
$products = $productController->getProducts();

?>
<?php include '../components/middleware.php'; ?>
<?php include '../components/sidebar.php'; ?>
<?php include '../components/header.php'; ?>

<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Danh sách sản phẩm</h1>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tiêu đề</th>
                            <th>File</th>
                            <th>Mô tả</th>
                            <th>Giá</th>
                            <th>Ảnh</th>
                            <th>Hành động </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($products as $product) : ?>
                            <tr>
                                <td><?= $product['id'] ?></td>
                                <td><?= $product['title'] ?></td>
                                <td><a href="<?= $product['file_path'] ?>" download> Tải xuống </a></td>
                                <td><?= $product['description'] ?></td>
                                <td><?= $product['price'] ?></td>
                                <td><img src="<?= $product['thumbnail'] ?>" alt="Course Image" style="width: 100px; height: auto;"></td>
                                <td>
                                    <a href="./edit-product.php?id=<?= $product['id'] ?>">Edit</a> |
                                    <a href="../../../delete-product?id=<?= $product['id'] ?>">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>
<?php include '../components/footer.php'; ?>