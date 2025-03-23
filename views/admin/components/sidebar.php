<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Blank</title>
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">


        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">


            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">H2agency <sup>vn</sup></div>
            </a>


            <hr class="sidebar-divider my-0">
            <li class="nav-item">
                <a class="nav-link nav-link collapsed" href="user.php" data-toggle="collapse" data-target="#user"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-shopping-cart"></i>


                    <span>Đơn hàng</span></a>
                <div id="user" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="orders.php">Tất cả đơn hàng </a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link nav-link collapsed" href="user.php" data-toggle="collapse" data-target="#user"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-user-alt"></i>
                    <span>User</span></a>
                <div id="user" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="user.php">Tất cả tài khoản </a>
                        <a class="collapse-item" href="add-user.php">Thêm mới </a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="user.php" data-toggle="collapse" data-target="#coursers"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-bookmark"></i>
                    <span>Sản phẩm</span></a>
                <div id="coursers" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="product.php">Tất cả sản phẩm</a>
                        <a class="collapse-item" href="add-product.php">Thêm mới </a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="form-contact.php">
                <i class="fas fa-fw fa-envelope"></i>
                    <span>Form Contact </span></a>
            </li>
          
        </ul>