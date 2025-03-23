<?php
require_once(__DIR__ . '/../database.php');
class ContactController
{
  private $conn;

  public function __construct()
  {
    $database = new Database();
    $db = $database->getConnection();
    $this->conn = $db;
  }
  public function addContact()
  {
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $query = "INSERT INTO contact (full_name, email, title, content) VALUES (:full_name, :email, :title, :content)";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':full_name', $full_name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':content', $content);
    $stmt->execute();
    return $stmt->rowCount();
  }



  public function deleteContact($id){
    $query = "DELETE FROM contact WHERE id = :id";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':id', $id);
    return $stmt->execute();
  }

  public function getAllContact(){
    $query = "SELECT * FROM contact";
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  
}
