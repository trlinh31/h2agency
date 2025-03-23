<?php include '../components/middleware.php'; ?>
<?php include '../components/sidebar.php'; ?>
<?php include '../components/header.php'; ?>
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Thêm người dùng mới </h1>
    <form action="../../../add-user" method="post" enctype="multipart/form-data">
        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-2">
                <input type="text" class="form-control form-control-user" id="exampleFirstName"
                    placeholder="Username" name="name">
            </div>
            <div class="col-sm-6 mb-3 mb-2">
                <input type="text" class="form-control form-control-user" id="exampleFirstName"
                    placeholder="Email" name="email">
            </div>
            <div class="col-sm-6 mb-3 mb-2">
                <input type="text" class="form-control form-control-user" id="exampleFirstName"
                    placeholder="Password" name="password">
            </div>
            <div class="col-sm-6 mb-3 mb-2">
                <select class="form-control form-control-user" id="exampleFirstName" name="role">
                    <option  name="admin" value="admin">Admin</option>
                    <option name="khach_hang" value="khach_hang">User</option>
                </select>
            </div>
        </div>
        <button class="btn btn-primary">Thêm</button>
    </form>
</div>

<?php include '../components/footer.php'; ?>