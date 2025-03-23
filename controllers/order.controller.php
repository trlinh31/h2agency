<?php
require_once(__DIR__ . '/../database.php');
class OrderController
{
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $db = $database->getConnection();
        $this->conn = $db;
    }
    public function addOrder($order)
    {

        $user_id = $_SESSION['user_id'];
        $total_price = $_POST['total_price'];

        $query = "INSERT INTO orders (user_id, total_price) VALUES (:user_id, :total_price)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':total_price', $total_price);

        if ($stmt->execute()) {
            $order_id = $this->conn->lastInsertId();

            foreach ($order as $item) {

                $product_id = $item['id'];
                $price = $item['price'];
                $quantity = $item['quantity'];

                $query = "INSERT INTO order_items (order_id, product_id, price, quantity) VALUES (:order_id, :product_id, :price, :quantity)";
                $stmt = $this->conn->prepare($query);
                $stmt->bindParam(':order_id', $order_id);
                $stmt->bindParam(':product_id', $product_id);
                $stmt->bindParam(':price', $price);
                $stmt->bindParam(':quantity', $quantity);

                if (!$stmt->execute()) {
                    return false;
                }
            }
        }
    }


    public function getAllOrders()
    {
        $query = "SELECT 
        orders.user_id, 
        orders.id AS order_id,
        users.name AS user_name,
        orders.total_price AS total_price
    FROM orders
    INNER JOIN users ON orders.user_id = users.id";
    
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
