<?php

require_once 'database.php';
require_once 'controllers/product.controller.php';
require_once 'controllers/auth.controller.php';
require_once 'controllers/contact.controller.php';


$productController = new ProductController();
$authController = new AuthController();
$contactController = new ContactController();


$request_uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$request_uri = str_replace($base_path, '', $request_uri);

echo $request_uri;

switch ($request_uri) {
  case '/':
    $products = $productController->getProducts();
    require_once './views/homepage.php';
    break;
  case '/lien-he':
    // require_once './views/contact.php';
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




    //admin


  case '/add-product':
    $productController->addProduct();
    header("Location: {$base_path}/views/admin/pages/product.php");
    break;

  case '/delete-product':
    $id = $_GET['id'];
    $productController->deleteProduct($id);
    header("Location: {$base_path}/views/admin/pages/product.php");
    break;

  case '/edit-product':
    $productController->updateProduct();
    header("Location: {$base_path}/views/admin/pages/product.php");
    break;



  case '/add-user':
    $authController->addUser();
    header("Location: {$base_path}/views/admin/pages/user.php");
    break;

  case '/delete-user':
    $id = $_GET['id'];
    $authController->deleteUser($id);
    header("Location: {$base_path}/views/admin/pages/user.php");
    break;

  case '/edit-user':
    $authController->updateUser();
    header("Location: {$base_path}/views/admin/pages/user.php");
    break;


  case '/delete-contact':
    $id = $_GET['id'];
    $contactController->deleteContact($id);
    header("Location: {$base_path}/views/admin/pages/form-contact.php");
    break;

  case '/add-contact':
    $addContact = $contactController->addContact();
    if ($addContact > 0) {
      header("Location: {$base_path}/");
      exit;
    }
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
