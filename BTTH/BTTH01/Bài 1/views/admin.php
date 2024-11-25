<div class="table-wrapper">
    <div class="table-title">
        <div class="row">
            <div class="col-sm-6">
                <h2>Danh Sách Các Loài Hoa</h2>
            </div>
        </div>
    </div>
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
    <div class="clearfix">
        <div class="hint-text">Hiển thị <b><?= count($flowers) ?></b> loài hoa</div>
        <ul class="pagination">
            <li class="page-item disabled"><a href="#">Trước</a></li>
            <li class="page-item"><a href="#" class="page-link">1</a></li>
            <li class="page-item active"><a href="#" class="page-link">2</a></li>
            <li class="page-item"><a href="#" class="page-link">3</a></li>
            <li class="page-item"><a href="#" class="page-link">Sau</a></li>
        </ul>
    </div>
</div>
