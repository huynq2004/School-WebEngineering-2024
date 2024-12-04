<?php include APP_ROOT . '/app/views/layouts/header.php'; ?>

<div class="container mt-4">
    <h2>Chỉnh sửa sản phẩm</h2>
    <form action="?controller=Product&action=update" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $product->getId(); ?>">
        <div class="mb-3">
            <label for="name" class="form-label">Tên sản phẩm</label>
            <input type="text" name="name" class="form-control" id="title" value="<?= $product->getName(); ?>" required>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Giá sản phẩm</label>
            <textarea name="price" class="form-control" id="content" rows="5" required><?= $product->getPrice(); ?></textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Hình ảnh</label>
            <input type="file" name="image" class="form-control" id="image">
            <img src="<?= DOMAIN . 'public/images/' . $product->getImage(); ?>" alt="Current Image" style="width: 150px; height: 100px;">
        </div>
        <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
        <a href="?controller=Product&action=index" class="btn btn-secondary">Hủy</a>
    </form>
</div>

<?php include APP_ROOT . '/app/views/layouts/footer.php'; ?>