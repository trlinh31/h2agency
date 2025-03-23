<?php require_once('../../../controllers/order.controller.php');
$orderController = new OrderController();
$order = $orderController->getAllOrders();
?>
<?php include '../components/middleware.php'; ?>
<?php include '../components/sidebar.php'; ?>
<?php include '../components/header.php'; ?>
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Danh sách đơn hàng</h1>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên người đặt</th>
                            <th>Tổng tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                          foreach ($order as $item) {
                            echo "<tr>";
                            echo "<td>" . $item['order_id'] . "</td>";
                            echo "<td>" . $item['user_name'] . "</td>";
                            echo "<td>" . $item['total_price'] . "</td>";

                            echo "</tr>";
                          }
                         ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<?php include '../components/footer.php'; ?>