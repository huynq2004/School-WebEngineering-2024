<?php 
include APP_ROOT . '/app/views/layouts/header.php'; ?>

<div class="container mt-4">
    <h2>Thêm sản phẩm mới</h2>
    <form action="?controller=Product&action=add" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="name" class="form-label">Tiêu đề</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Nhập tên sản phẩm" required>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Nội dung</label>
            <textarea name="price" class="form-control" id="price" rows="5" placeholder="Nhập giá sản phẩm" required></textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Hình ảnh</label>
            <input type="file" name="image" class="form-control" id="image" required>
        </div>
        <button type="submit" class="btn btn-primary">Thêm mới</button>
        <a href="?controller=Product&action=index" class="btn btn-secondary">Hủy</a>
    </form>
</div>

<?php include APP_ROOT . '/app/views/layouts/footer.php'; ?>
