<?php
include '../data/flowers.php';  // Gọi mảng hoa từ flowers.php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $description = $_POST['description'] ?? '';
    $image = $_FILES['image']['name'] ?? '';

    if ($name && $description && $image) {
        $targetDir = '../images/';
        $targetFile = $targetDir . basename($image);
        move_uploaded_file($_FILES['image']['tmp_name'], $targetFile);

        // Tạo id tự động tăng
        $newId = count($flowers) + 1;

        // Thêm hoa vào mảng
        $flowers[] = [
            'id' => $newId,
            'name' => $name,
            'description' => $description,
            'image' => 'images/' . $image
        ];

        // Chuyển hướng tới actions.php với thông báo thêm thành công
        header('Location: actions.php?action=add');
        exit;
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Hoa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center">Thêm Loài Hoa Mới</h2>
    <form method="POST" enctype="multipart/form-data" class="mt-4">
        <div class="mb-3">
            <label for="name" class="form-label">Tên Hoa</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Mô Tả</label>
            <textarea name="description" id="description" class="form-control" rows="4" required></textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Hình Ảnh</label>
            <input type="file" name="image" id="image" class="form-control" accept="image/*" required>
        </div>
        <button type="submit" class="btn btn-primary">Thêm Hoa</button>
        <a href="../index.php?role=admin" class="btn btn-secondary">Quay Lại</a>
    </form>
</div>
</body>
</html>
