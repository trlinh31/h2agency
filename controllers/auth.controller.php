<?php
require_once(__DIR__ . '/../database.php');
class AuthController
{
  private $conn;

  public function __construct()
  {
    $database = new Database();
    $db = $database->getConnection();
    $this->conn = $db;
  }

  public function deleteUser($id)
  {
    $query = "DELETE FROM users WHERE id = :id";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':id', $id);
    return $stmt->execute();
  }

  public function getUserID($id)
  {
    $query = "SELECT * FROM users WHERE id = :id";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function updateUser()
  {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    if (empty($password)) {
      $query = "UPDATE users SET name = :name, email = :email, role = :role WHERE id = :id";
      $stmt = $this->conn->prepare($query);
    } else {
      $query = "UPDATE users SET name = :name, email = :email, password = :password, role = :role WHERE id = :id";
      $stmt = $this->conn->prepare($query);
      $password_hash = password_hash($password, PASSWORD_BCRYPT);
      $stmt->bindParam(':password', $password_hash);
    }

    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':role', $role);

    return $stmt->execute();
  }


  public function addUser()
  {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    $query = "INSERT INTO users (name, email, password, role) VALUES (:name, :email, :password, :role)";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $password_hash = password_hash($password, PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password_hash);
    $stmt->bindParam(':role', $role);

    if ($stmt->execute()) {
      return ['status' => true];
    } else {
      return ['status' => false, 'message' => 'Lỗi khi đăng ký!'];
    }
  }


  public function getAllUsers()
  {
    $query = "SELECT * FROM users";
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
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
