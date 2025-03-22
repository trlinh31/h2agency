<?php

class AuthController
{
  private $conn;

  public function __construct($db)
  {
    $this->conn = $db;
  }

  public function register($name, $email, $password, $confirmPassword)
  {
    $query = "SELECT id FROM users WHERE email = :email";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
      return ['status' => false, 'message' => 'Email đã tồn tại!'];
    }

    if ($password !== $confirmPassword) {
      return ['status' => false, 'message' => 'Mật khẩu không trùng khớp!'];
    }

    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    $query = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $hashedPassword);

    if ($stmt->execute()) {
      return ['status' => true];
    } else {
      return ['status' => false, 'message' => 'Lỗi khi đăng ký!'];
    }
  }

  public function login($email, $password)
  {
    $query = "SELECT * FROM users WHERE email = :email";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
      return ['status' => false, 'message' => 'Email hoặc mật khẩu không đúng!'];
    }

    if (password_verify($password, $user['password'])) {
      $_SESSION['user_id'] = $user['id'];
      $_SESSION['name'] = $user['name'];
      $_SESSION['email'] = $user['email'];
      $_SESSION['role'] = $user['role'];

      return ['status' => true, 'role' => $user['role']];
    } else {
      return ['status' => false, 'message' => 'Email hoặc mật khẩu không đúng!'];
    }
  }

  public function logout()
  {
    session_destroy();
  }
}
