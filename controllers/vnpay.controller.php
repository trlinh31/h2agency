<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');

class VnPayController
{
  private $vnp_TmnCode = "PJCNXYWL";
  private $vnp_HashSecret = "0NVE7YL3N6PKEJMJ8GYFPXDVQN5NABTE";
  private $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
  private $vnp_ReturnUrl = "http://localhost/h2agency/ket-qua";

  private $conn;

  public function __construct()
  {
    $database = new Database();
    $db = $database->getConnection();
    $this->conn = $db;
  }

  public function addOrder($productId, $totalPrice)
  {
    if (!isset($_SESSION['user_id'])) {
      header('Location: ./dang-nhap');
      exit();
    }

    $user_id = $_SESSION['user_id'];

    $query = "INSERT INTO orders (user_id, total_price) VALUES (:user_id, :total_price)";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':total_price', $totalPrice);

    if ($stmt->execute()) {
      $order_id = $this->conn->lastInsertId();

      $query = "SELECT file_path FROM products WHERE id = :product_id";
      $stmt = $this->conn->prepare($query);
      $stmt->bindParam(':product_id', $productId);
      $stmt->execute();

      $filePath = $stmt->fetchColumn();
      $_SESSION['filePath'] = $filePath;

      $query = "INSERT INTO order_items (order_id, product_id, price) VALUES (:order_id, :product_id, :price)";
      $stmt = $this->conn->prepare($query);
      $stmt->bindParam(':order_id', $order_id);
      $stmt->bindParam(':product_id', $productId);
      $stmt->bindParam(':price', $totalPrice);

      $stmt->execute();
    }
  }

  public function processPayment($amount)
  {
    $vnp_Locale = "vn";
    $vnp_BankCode = "NCB";
    $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
    $vnp_TxnRef = time();

    $inputData = array(
      "vnp_Version" => "2.1.0",
      "vnp_TmnCode" => $this->vnp_TmnCode,
      "vnp_Amount" => $amount * 100,
      "vnp_Command" => "pay",
      "vnp_CreateDate" => date('YmdHis'),
      "vnp_CurrCode" => "VND",
      "vnp_IpAddr" => $vnp_IpAddr,
      "vnp_Locale" => $vnp_Locale,
      "vnp_OrderInfo" => "Thanh toán đơn hàng",
      "vnp_OrderType" => "other",
      "vnp_ReturnUrl" => $this->vnp_ReturnUrl,
      "vnp_TxnRef" => $vnp_TxnRef
    );

    if (isset($vnp_BankCode) && $vnp_BankCode != "") {
      $inputData['vnp_BankCode'] = $vnp_BankCode;
    }

    ksort($inputData);
    $query = "";
    $i = 0;
    $hashData = "";

    foreach ($inputData as $key => $value) {
      if ($i == 1) {
        $hashData .= '&' . urlencode($key) . "=" . urlencode($value);
      } else {
        $hashData .= urlencode($key) . "=" . urlencode($value);
        $i = 1;
      }
      $query .= urlencode($key) . "=" . urlencode($value) . '&';
    }

    $this->vnp_Url = $this->vnp_Url . "?" . $query;

    if (isset($this->vnp_HashSecret)) {
      $vnpSecureHash =   hash_hmac('sha512', $hashData, $this->vnp_HashSecret);
      $this->vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
    }

    header('Location: ' . $this->vnp_Url);
  }
}
