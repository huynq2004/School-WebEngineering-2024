<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>Danh Sách Sản Phẩm</h2>
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>Tên</th>
						<th>Giá</th>
						<th>Sửa</th>
						<th>Xóa</th>
					</tr>
				</thead>
				<tbody>
					<tr>
                    <?php foreach ($products as $index => $product): ?>
                        <tr>
                            <td><?= htmlspecialchars($product['name']) ?></td>
                            <td><?= htmlspecialchars($product['price']) ?> VND</td>
                            <td><a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="" data-original-title="Edit"></i></a></td>
                            <td><a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="" data-original-title="Delete"></i></a></td>
                        </tr>
                    <?php endforeach; ?>
				</tbody>
			</table>
			<div class="clearfix">
				<div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
				<ul class="pagination">
					<li class="page-item disabled"><a href="#">Previous</a></li>
					<li class="page-item"><a href="#" class="page-link">1</a></li>
					<li class="page-item"><a href="#" class="page-link">2</a></li>
					<li class="page-item active"><a href="#" class="page-link">3</a></li>
					<li class="page-item"><a href="#" class="page-link">4</a></li>
					<li class="page-item"><a href="#" class="page-link">5</a></li>
					<li class="page-item"><a href="#" class="page-link">Next</a></li>
				</ul>
			</div>
		</div>