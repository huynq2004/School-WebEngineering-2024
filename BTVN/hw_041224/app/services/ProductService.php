<?php
require_once APP_ROOT .'/app/models/Product.php';
require_once APP_ROOT .'/app/config/database.php';

class ProductService{
    public function getAllProduct()
    {
        $products = [];
        //Kết nối đến CSDL
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();

        if ($conn != null) {
            //Truy vấn
            $sql = "SELECT * FROM products ORDER BY id ASC";
            $stmt = $conn->query($sql);

            //Xử lý kết quả trả về
            while ($row = $stmt->fetch()) {
                $products[] = new Product($row['id'], $row['name'], $row['price'], $row['image']);
            }
            return $products;
        }
    }

    public function getProductById($id) {
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();
    
        if ($conn != null){
            $sql = "SELECT * FROM products WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
        
            $row = $stmt->fetch();

            // Kiểm tra xem có dữ liệu không trước khi tạo đối tượng
            if ($row) {
                return new Product(
                    $row['id'],
                    $row['name'],
                    $row['price'],
                    $row['image']
                );
            } else {
                // Xử lý trường hợp không tìm thấy bài viết
                return null;
            }
    
        } else {
            echo 'Không kết nối được tới cơ sở dữ liệu';
            return null;
        }
    }
    
    public function updateProduct($id, $name, $price, $image) {
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();
    
        if ($conn != null) {
            $sql = "UPDATE products SET name = :name, price = :price, image = :image WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':price', $price);
            $stmt->bindParam(':image', $image);
    
            return $stmt->execute();
        } else {
            return false;
        }
    }
    

    public function delete($id)
    {
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();

        if ($conn != null) {
            $sql = "DELETE FROM products WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
        } else {
            echo 'Không thể kết nối cơ sở dữ liệu!';
        }
    }


    public function addProduct($name, $price, $imageName)
    {
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();

        if ($conn != null) {
            $sql = "INSERT INTO products (name, price, image) VALUES (:name, :price, :imageName)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':price', $price);
            $stmt->bindParam(':imageName', $imageName);
            $stmt->execute();
        } else {
            echo 'Không thể kết nối cơ sở dữ liệu!';
        }
    }
}
    
        