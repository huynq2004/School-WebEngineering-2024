<?php
require_once APP_ROOT . '/app/services/ProductService.php';
class ProductController
{
    public function index()
    {
        //Gọi dữ liệu từ NewsService
        $productService = new ProductService();
        $products = $productService->getAllProduct();

        //Render dữ liệu lấy ra vào dashboard
        include APP_ROOT . '/app/views/admin/dashboard.php';
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            $price = $_POST['price'] ?? '';
            $image = $_FILES['image'] ?? null;

            $imageName = null;
            if ($image && $image['error'] === UPLOAD_ERR_OK) {
                $uploadDir = APP_ROOT . '/public/images/';
                $imageName = basename($image['name']);
                $uploadFile = $uploadDir . $imageName;

                if (!move_uploaded_file($image['tmp_name'], $uploadFile)) {
                    echo "Không thể upload hình ảnh!";
                    exit();
                }
            }

            $productService = new ProductService();
            $productService->addProduct($name, $price, $imageName);

            // Chuyển hướng về danh sách
            header('Location: ?controller=Product&action=index');
            exit();
        }

        include APP_ROOT . '/app/views/admin/product/add.php';
    }

    public function edit()
    {
        $id = isset($_GET['id']) ? intval($_GET['id']) : null;

        if ($id) {
            $productService = new ProductService();
            $product = $productService->getProductById($id);

            if ($product) {
                include APP_ROOT . '/app/views/admin/product/edit.php';
            } else {
                echo "Bài viết không tồn tại.";
            }
        } else {
            echo "ID không hợp lệ.";
        }
    }

    public function showAdd()
    {
        include APP_ROOT . '/app/views/admin/product/add.php';
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $price = $_POST['price'];
            $image = $_FILES['image'];

            $productService = new ProductService();

            if (!empty($image['name'])) {
                $imageName = time() . '_' . $image['name'];
                move_uploaded_file($image['tmp_name'], APP_ROOT . '/public/images/' . $imageName);
            } else {
                $product = $productService->getProductById($id);
                $imageName = $product->getImage();
            }

            $success = $productService->updateProduct($id, $name, $price, $imageName);

            if ($success) {
                header("Location: " . DOMAIN . "public/index.php?controller=Product&action=index");
                exit();
            } else {
                echo "Cập nhật không thành công.";
                exit();
            }
        }
    }

    public function delete()
    {
        $id = $_POST['id'] ?? null;

        if ($id) {
            $productService = new ProductService();
            $productService->delete($id);

            // Chuyển hướng về dashboard sau khi xóa
            header('Location: ?controller=Product&action=index');
            exit();
        } else {
            echo "ID không hợp lệ!";
        }
    }
}
