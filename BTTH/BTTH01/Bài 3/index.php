<?php include 'header.php'; ?>

<div class="container mt-5">
    <h1 class="text-center">Danh sách sinh viên</h1>

    <?php
    $sinhvien = include 'read_csv.php';
    //print_r( $sinhvien );
    ?>
P/s: Em đã in mảng ra test, đúng key r mà vẫn k chạy đc thầy ạ. Em k bt tại sao nữa, em xp lỗi này hỏi thầy sau ạ!
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Username</th>
                <th>Password</th>
                <th>Họ</th>
                <th>Tên</th>
                <th>City</th>
                <th>Email</th>
                <th>Course</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($sinhvien as $sv) {
                echo "<tr>";
                echo "<td>{$sv['username']}</td>";
                echo "<td>{$sv['password']}</td>";
                echo "<td>{$sv['lastname']}</td>";
                echo "<td>{$sv['firstname']}</td>";
                echo "<td>{$sv['city']}</td>";
                echo "<td>{$sv['email']}</td>";
                echo "<td>{$sv['course1']}</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<?php include 'footer.php'; ?>
