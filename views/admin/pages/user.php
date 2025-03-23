<?php require_once('../../../controllers/auth.controller.php');
$authController = new AuthController();
$users = $authController->getAllUsers();
?>
<?php include '../components/middleware.php'; ?>
<?php include '../components/sidebar.php'; ?>
<?php include '../components/header.php'; ?>
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Danh sách tài khoản </h1>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>User Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Hành động </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                          foreach ($users as $user) {
                            echo "<tr>";
                            echo "<td>" . $user['id'] . "</td>";
                            echo "<td>" . $user['name'] . "</td>";
                            echo "<td>" . $user['email'] . "</td>";
                            echo "<td>" . $user['role'] . "</td>";
                            echo "<td><a href='./edit-user.php?id=" . $user['id'] . "'>Edit</a> | <a href='../../../delete-user?id=" . $user['id'] . "'>Delete</a></td>";
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