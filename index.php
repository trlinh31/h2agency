<?php

session_start();
require_once 'database.php';
require_once 'controllers/product.controller.php';
require_once 'controllers/auth.controller.php';

$database = new Database();
$db = $database->getConnection();
$productController = new ProductController($db);
$authController = new AuthController($db);

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
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $email = $_POST['email'];
      $password = $_POST['password'];

      $result = $authController->login($email, $password);

      if ($result['status'] === true) {
        // $role = $result['role'];

        // if($role === "admin") {
        //   header('Location: ./?page=quan-ly-san-pham');
        //   exit();
        // }

        header('Location: ./');
        exit();
      } else {
        $_SESSION['error_message'] = $result['message'];
        header('Location: ./?page=dang-nhap');
        exit();
      }
    }
    require_once './views/login.php';
    break;
  case 'dang-ky':
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $fullName = $_POST['fullName'];
      $email = $_POST['email'];
      $password = $_POST['password'];
      $confirmPassword = $_POST['confirmPassword'];

      $result = $authController->register($fullName, $email, $password, $confirmPassword);

      if ($result['status'] === true) {
        header('Location: ./?page=dang-nhap');
        exit();
      } else {
        $_SESSION['error_message'] = $result['message'];
        header('Location: ./?page=dang-ky');
        exit();
      }
    }
    require_once './views/register.php';
    break;
}
