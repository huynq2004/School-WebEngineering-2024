<?php
include '../data/flowers.php';

$action = $_GET['action'] ?? '';

$actionMessage = '';
switch ($action) {
    case 'add':
        $actionMessage = 'Thêm loài hoa thành công!';
        break;
    case 'edit':
        $actionMessage = 'Cập nhật loài hoa thành công!';
        break;
    case 'delete':
        $actionMessage = 'Xóa loài hoa thành công!';
        break;
    default:
        $actionMessage = '';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Các Loài Hoa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center">Danh Sách Các Loài Hoa</h2>
    
    <?php if ($actionMessage): ?>
        <div class="alert alert-success">
            <?= htmlspecialchars($actionMessage) ?>
        </div>
    <?php endif; ?>

    <div class="table-wrapper">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Tên Hoa</th>
                    <th>Mô Tả</th>
                    <th>Hình Ảnh</th>
                    <th>Hành Động</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($flowers as $flower): ?>
                <tr>
                    <td><?= htmlspecialchars($flower['name']) ?></td>
                    <td><?= htmlspecialchars($flower['description']) ?></td>
                    <td>
                        <img src="<?= htmlspecialchars($flower['image']) ?>" alt="<?= htmlspecialchars($flower['name']) ?>" class="img-thumbnail" style="max-width: 100px;">
                    </td>
                    <td>
                        <a href="actions/edit.php?name=<?= urlencode($flower['name']) ?>" class="edit">
                            <i class="material-icons" data-toggle="tooltip" title="Sửa"></i>
                        </a>
                        <a href="actions/delete.php?name=<?= urlencode($flower['name']) ?>" class="delete">
                            <i class="material-icons" data-toggle="tooltip" title="Xóa"></i>
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
