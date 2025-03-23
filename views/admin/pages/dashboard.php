<?php include '../components/middleware.php'; ?>
<?php include '../components/sidebar.php'; ?>
<?php include '../components/header.php'; ?>
<?php

require_once __DIR__ . '../../../../controller/CoursesController.php';
require_once __DIR__ . '../../../../controller/CategoryController.php';
require_once __DIR__ . '../../../../controller/UserController.php';
require_once __DIR__ . '../../../../controller/FormContactController.php';

$coursesController = new CoursesController();
$categoriesController = new CategoryController();
$userController = new UserController();
$formContactController = new FormContactController();


$sumCategory = $categoriesController->getSum();
$sumCourses = $coursesController->getSum();
$sumUser = $userController->getSum();
$sumFormContact = $formContactController->getSum();


?>

<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>

    <div class="row">
        <div class="col-lg-3 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Tổng số danh mục</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $sumCategory['total']; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Tổng số người dùng</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $sumUser['total']; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Tổng số người liên hệ </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $sumFormContact['total']; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Tổng số khóa học </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $sumCourses['total']; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
<?php include '../components/footer.php'; ?>