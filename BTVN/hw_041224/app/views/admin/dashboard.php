<?php include APP_ROOT . '/app/views/layouts/header.php'; ?>
    <div class="container mt-4">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th scope="col">
                        <a href="?controller=Product&action=showAdd" class="btn btn-success">Thêm sản phẩm</a>
                    </th>
                    <th scope="col"></th>
                    <th scope="col">Sửa</th>
                    <th scope="col">Xóa</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($products as $product) {
                ?>
                    <tr>
                        <td scope="row" style="width: 166px">
                            <img src="<?= DOMAIN.'public/images/'.$product->getImage()?>" class="img-thumbnail" alt="Ảnh thumbnail tin tức" style="width: 150px; height: 100px;">
                        </td>
                        <td>
                            <h5><?= $product->getName() ?></h5>
                            <p><?= $product->getPrice() ?></p>
                        </td>
                        <td style="vertical-align: middle;">
                            <a href="?controller=Product&action=edit&id=<?= $product->getId();  ?>" title="Sửa"><i class="bi-pencil-square" style="font-size: 30px;"></i></a>
                        </td>
                        <td style="vertical-align: middle;">
                            <form action="?controller=Product&action=delete" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa tin này?')">
                                <input type="hidden" name="id" value="<?= $product->getId() ?>">
                                <button type="submit" class="btn btn-link p-0 m-0 text-danger" style="border: none; background: none;">
                                    <i class="bi bi-trash" style="font-size: 30px;"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
<?php include APP_ROOT . '/app/views/layouts/footer.php'; ?>