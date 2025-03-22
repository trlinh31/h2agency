<?php

class ProductController
{
  private $conn;

  public function __construct($db)
  {
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

  // public function addProduct($data, $file)
  // {
  //   try {
  //     if ($file['product_image']['error'] == 0) {
  //       $uploadDir = dirname(__DIR__) . "/uploads/";;
  //       if (!is_dir($uploadDir)) {
  //         mkdir($uploadDir, 0777, true);
  //       }

  //       $imageName = time() . "_" . basename($file['product_image']['name']);
  //       $imagePath = $uploadDir . $imageName;

  //       $imageFullPath = "";
  //       if (move_uploaded_file($file['product_image']['tmp_name'], $imagePath)) {
  //         $imageFullPath = "http://localhost/kids_plaza/uploads/" . $imageName;
  //       } else {
  //         throw new Exception("Lỗi khi di chuyển file!");
  //       }
  //     } else {
  //       throw new Exception("Lỗi tải ảnh: " . $file['product_image']['error']);
  //     }

  //     $query = "INSERT INTO san_pham (ten_san_pham, so_luong, gia, gia_goc, id_nhan_hieu, id_danh_muc, mo_ta, anh) 
  //               VALUES (:name, :quantity, :price_discount, :price, :brand, :category, :description, :image)";

  //     $stmt = $this->conn->prepare($query);
  //     $stmt->bindParam(':name', $data['product_name']);
  //     $stmt->bindParam(':quantity', $data['quantity']);
  //     $stmt->bindParam(':price', $data['price']);
  //     $stmt->bindParam(':price_discount', $data['price_discount']);
  //     $stmt->bindParam(':brand', $data['brand']);
  //     $stmt->bindParam(':category', $data['category']);
  //     $stmt->bindParam(':description', $data['description']);
  //     $stmt->bindParam(':image', $imageFullPath);

  //     if ($stmt->execute()) {
  //       return ['status' => true, 'message' => 'Thêm sản phẩm thành công!'];
  //     } else {
  //       return ['status' => false, 'message' => 'Lỗi khi thêm sản phẩm!'];
  //     }
  //   } catch (Exception $e) {
  //     return ['status' => false, 'message' => $e->getMessage()];
  //   }
  // }

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
