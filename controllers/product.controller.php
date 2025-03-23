<?php
require_once(__DIR__ . '/../database.php');
class ProductController
{
  private $conn;

  public function __construct()
  {
    $database = new Database();
    $db = $database->getConnection();
    $this->conn = $db;
  }

  public function getProducts()
  {
    $query = "SELECT * FROM products";
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getProductById($id)
  {
    $query = "SELECT * FROM products WHERE id = :id";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function addProduct()
{
    try {
      
      

        $uploadDir = './uploads/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        if (!isset($_FILES['image']) || $_FILES['image']['error'] !== 0) {
            die("Lỗi tải ảnh lên: " . $_FILES['image']['error']);
        }

        $fileName = basename($_FILES['image']['name']);
        $targetFilePath = $uploadDir . $fileName;

        $allowedImageTypes = ['image/jpeg', 'image/png', 'image/gif'];
       

        move_uploaded_file($_FILES['image']['tmp_name'], $targetFilePath);
        $targetFilePath = 'http://localhost/h2agency/uploads/'  . $fileName;
        $imageFullPath = $targetFilePath;

        if (!isset($_FILES['filePdf']) || $_FILES['filePdf']['error'] !== 0) {
            die("Lỗi tải file PDF lên: " . $_FILES['filePdf']['error']);
        }

        $filePdf = basename($_FILES['filePdf']['name']);
        $targetFilePdfPath = $uploadDir . $filePdf;

        if ($_FILES['filePdf']['type'] !== 'application/pdf') {
            die("Lỗi: Chỉ chấp nhận file PDF.");
        }

        move_uploaded_file($_FILES['filePdf']['tmp_name'], $targetFilePdfPath);
        $targetFilePdfPath = 'http://localhost/h2agency/uploads/' . $filePdf;
        $fileFullPath = $targetFilePdfPath;

        if (empty($_POST['title']) || empty($_POST['description']) || empty($_POST['price'])) {
            die("Lỗi: Tất cả các trường đều phải nhập!");
        }

        $query = "INSERT INTO products (title, description, price, file_path, thumbnail) 
                  VALUES (:title, :description, :price, :file_path, :thumbnail)";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':title', $_POST['title']);
        $stmt->bindParam(':description', $_POST['description']);
        $stmt->bindParam(':price', $_POST['price']);
        $stmt->bindParam(':file_path', $fileFullPath);
        $stmt->bindParam(':thumbnail', $imageFullPath);

        if ($stmt->execute()) {
            echo "Thêm sản phẩm thành công!";
        } else {
            die("Lỗi SQL: " . implode(" | ", $stmt->errorInfo()));
        }
    } catch (Exception $e) {
        die("Lỗi: " . $e->getMessage());
    }
}


public function deleteProduct($id)
{
    try {
        $query = "DELETE FROM products WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        if ($stmt->execute()) {
            echo "Xóa sản phẩm thành công!";
        } else {
            die("Lỗi SQL: " . implode(" | ", $stmt->errorInfo()));
        }
    } catch (Exception $e) {
        die("Lỗi: " . $e->getMessage());
    }
}


public function updateProduct()
{
    try {
        $id = $_POST['id'];
        $query = "SELECT * FROM products WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $product = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$product) {
            die("Lỗi: Sản phẩm không tồn tại!");
        }

       
        $title = $_POST['title'] ?? '';
        $description = $_POST['description'] ?? '';
        $price = $_POST['price'] ?? '';

        if (empty($title) || empty($description) || empty($price)) {
            die("Lỗi: Tất cả các trường đều phải nhập!");
        }

      
        $uploadDir = './uploads/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

       
        $imageFullPath = $product['thumbnail']; 
        if (!empty($_FILES['image']['name'])) {
            if ($_FILES['image']['error'] !== 0) {
                die("Lỗi tải ảnh lên: " . $_FILES['image']['error']);
            }

           

            $fileName = basename($_FILES['image']['name']);
            $targetFilePath = $uploadDir . $fileName;
            move_uploaded_file($_FILES['image']['tmp_name'], $targetFilePath);
            $targetFilePath = 'http://localhost/h2agency/uploads/' . $fileName;

            $imageFullPath = $targetFilePath; 

        }

        $fileFullPath = $product['file_path']; 
        if (!empty($_FILES['filePdf']['name'])) {
            if ($_FILES['filePdf']['error'] !== 0) {
                die("Lỗi tải file PDF lên: " . $_FILES['filePdf']['error']);
            }

            if ($_FILES['filePdf']['type'] !== 'application/pdf') {
                die("Lỗi: Chỉ chấp nhận file PDF.");
            }

            $filePdf = basename($_FILES['filePdf']['name']);
            $targetFilePdfPath = $uploadDir . $filePdf;
            move_uploaded_file($_FILES['filePdf']['tmp_name'], $targetFilePdfPath);
            $targetFilePath = 'http://localhost/h2agency/uploads/' . $filePdf;
            $fileFullPath = $targetFilePdfPath;
        }

        $query = "UPDATE products 
                  SET title = :title, description = :description, price = :price, 
                      file_path = :file_path, thumbnail = :thumbnail 
                  WHERE id = :id";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':file_path', $fileFullPath);
        $stmt->bindParam(':thumbnail', $imageFullPath);
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            echo "Cập nhật sản phẩm thành công!";
        } else {
            die("Lỗi SQL: " . implode(" | ", $stmt->errorInfo()));
        }
    } catch (Exception $e) {
        die("Lỗi: " . $e->getMessage());
    }
}


  
  
  

  // public function updateProduct($data, $file)
  // {
  //   try {
  //     $query = "SELECT * FROM san_pham WHERE id = :productId";
  //     $stmt = $this->conn->prepare($query);
  //     $stmt->bindParam(':productId', $data['product_id']);
  //     $stmt->execute();
  //     $product = $stmt->fetch(PDO::FETCH_ASSOC);

  //     if (!$product) {
  //       throw new Exception("Sản phẩm không tồn tại!");
  //     }

  //     $productName = $data['product_name'];
  //     $quantity = $data['quantity'];
  //     $price = $data['price'];
  //     $priceDiscount = $data['price_discount'];
  //     $brand = $data['brand'];
  //     $category = $data['category'];
  //     $description = $data['description'];
  //     $imagePath = $product['anh'];

  //     if ($file['product_image']['error'] == 0) {
  //       $uploadDir = dirname(__DIR__) . "/uploads/";
  //       if (!is_dir($uploadDir)) {
  //         mkdir($uploadDir, 0777, true);
  //       }

  //       $imageName = time() . "_" . basename($file['product_image']['name']);
  //       $newImagePath = $uploadDir . $imageName;

  //       if (move_uploaded_file($file['product_image']['tmp_name'], $newImagePath)) {
  //         $imagePath = "http://localhost/kids_plaza/uploads/" . $imageName;
  //       } else {
  //         throw new Exception("Lỗi khi tải ảnh lên!");
  //       }
  //     }

  //     $query = "UPDATE san_pham SET 
  //               ten_san_pham = :productName, 
  //               so_luong = :quantity, 
  //               gia = :priceDiscount, 
  //               gia_goc = :price, 
  //               id_nhan_hieu = :brand, 
  //               id_danh_muc = :category, 
  //               anh = :imagePath, 
  //               mo_ta = :description
  //               WHERE id = :productId";

  //     $stmt = $this->conn->prepare($query);
  //     $stmt->bindParam(':productId', $data['product_id']);
  //     $stmt->bindParam(':productName', $productName);
  //     $stmt->bindParam(':quantity', $quantity);
  //     $stmt->bindParam(':price', $price);
  //     $stmt->bindParam(':priceDiscount', $priceDiscount);
  //     $stmt->bindParam(':brand', $brand);
  //     $stmt->bindParam(':category', $category);
  //     $stmt->bindParam(':imagePath', $imagePath);
  //     $stmt->bindParam(':description', $description);

  //     if ($stmt->execute()) {
  //       return ['status' => true, 'message' => 'Cập nhật sản phẩm thành công!'];
  //     } else {
  //       throw new Exception("Lỗi khi cập nhật sản phẩm!");
  //     }
  //   } catch (Exception $e) {
  //     return ['status' => false, 'message' => $e->getMessage()];
  //   }
  // }

  // public function deleteProduct($productId)
  // {
  //   $query = "SELECT id FROM san_pham WHERE id = :productId";
  //   $stmt = $this->conn->prepare($query);
  //   $stmt->bindParam(':productId', $productId);
  //   $stmt->execute();
  //   $product = $stmt->fetch(PDO::FETCH_ASSOC);

  //   if (!$product) {
  //     throw new Exception("Sản phẩm không tồn tại!");
  //   }

  //   $deleteQuery = "DELETE FROM san_pham WHERE id = :productId";
  //   $deleteStmt = $this->conn->prepare($deleteQuery);
  //   $deleteStmt->bindParam(':productId', $productId);

  //   if ($deleteStmt->execute()) {
  //     return ['status' => true, 'message' => 'Xóa sản phẩm thành cong!'];
  //   } else {
  //     throw new Exception("Lỗi khi xóa sản phẩm!");
  //   }
  // }
}
