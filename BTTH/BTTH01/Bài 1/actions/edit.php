<?php
include '../data/flowers.php';

$id = $_GET['id'] ?? '';
$flowerToEdit = null;

foreach ($flowers as $flower) {
    if ($flower['id'] == $id) {
        $flowerToEdit = $flower;
        break;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newName = $_POST['name'] ?? '';
    $newDescription = $_POST['description'] ?? '';
    $newImage = $_FILES['image']['name'] ?? $flowerToEdit['image'];

    if ($newName && $newDescription) {
        if ($_FILES['image']['name']) {
            $targetDir = '../images/';
            $targetFile = $targetDir . basename($newImage);
            move_uploaded_file($_FILES['image']['tmp_name'], $targetFile);
            $newImage = 'images/' . $newImage;
        }

        foreach ($flowers as &$flower) {
            if ($flower['id'] == $id) {
                $flower['name'] = $newName;
                $flower['description'] = $newDescription;
                $flower['image'] = $newImage;
                break;
            }
        }

        header('Location: actions.php?action=edit');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh Sửa Hoa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center">Chỉnh Sửa Loài Hoa</h2>
    <?php if ($flowerToEdit): ?>
        <form method="POST" enctype="multipart/form-data" class="mt-4">
            <div class="mb-3">
                <label for="name" class="form-label">Tên Hoa</label>
                <input type="text" name="name" id="name" class="form-control" value="<?php echo $flowerToEdit['name']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Mô Tả</label>
                <textarea name="description" id="description" class="form-control" rows="4" required><?php echo $flowerToEdit['description']; ?></textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Hình Ảnh (Để trống nếu giữ ảnh cũ)</label>
                <input type="file" name="image" id="image" class="form-control" accept="image/*">
                <img src="../<?php echo $flowerToEdit['image']; ?>" alt="Hình ảnh hiện tại" class="img-thumbnail mt-3" width="200">
            </div>
            <button type="submit" class="btn btn-primary">Cập Nhật</button>
            <a href="../index.php?role=admin" class="btn btn-secondary">Quay Lại</a>
        </form>
    <?php else: ?>
        <div class="alert alert-danger">Không tìm thấy loài hoa cần sửa!</div>
    <?php endif; ?>
</div>
</body>
</html>
