<?php

session_start();
require_once 'database.php';
require_once 'controllers/product.controller.php';
// require_once 'controllers/category.controller.php';
// require_once 'controllers/brand.controller.php';
// require_once 'controllers/auth.controller.php';
// require_once 'controllers/cart.controller.php';
// require_once 'controllers/order.controller.php';
// require_once 'controllers/vnpay_payment.controller.php';

$database = new Database();
$db = $database->getConnection();
$productController = new ProductController($db);

$page = isset($_GET['page']) ? $_GET['page'] : '';
switch ($page) {
  case '':
    $products = $productController->getProducts();
    require_once './views/homepage.php';
    break;
  case 'lien-he':
    require_once './views/contact.php';
    break;
  case 'dang-nhap':
    require_once './views/login.php';
    break;
}
