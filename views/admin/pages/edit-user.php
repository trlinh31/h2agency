<?php  
require_once('../../../controllers/auth.controller.php');
$authController = new AuthController();;
$id = $_GET['id'];
$user = $authController->getUserID($id);
?>
<?php include '../components/middleware.php'; ?>
<?php include '../components/sidebar.php'; ?>
<?php include '../components/header.php'; ?>

<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Sửa người dùng</h1>
    <form action="../../../edit-user" method="post" enctype="multipart/form-data">
        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-2">
                <input type="text" class="form-control form-control-user" id="exampleFirstName"
                    placeholder="Username" name="name" value="<?php echo $user['name'] ?>">
            </div>
            <div class="col-sm-6 mb-3 mb-2">
                <input type="text" class="form-control form-control-user" id="exampleFirstName"
                    placeholder="Email" name="email" value="<?php echo $user['email']; ?>">
            </div>
            <div class="col-sm-6 mb-3 mb-2">
                <input type="text" class="form-control form-control-user" id="exampleFirstName"
                    placeholder="Password" name="password" value="">
            </div>
            <div class="col-sm-6 mb-3 mb-2">
                <select class="form-control form-control-user" id="exampleFirstName" name="role" value=>
                    <option value="admin" <?php echo ($user['role'] == 'admin') ? 'selected' : ''; ?>>Admin</option>
                    <option value="khach_hang" <?php echo ($user['role'] == 'khach_hang') ? 'selected' : ''; ?>>User</option>
                </select>
            </div>
            <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
        </div>
        <button class="btn btn-primary">Lưu </button>
    </form>
</div>
</script>
<?php include '../components/footer.php'; ?>