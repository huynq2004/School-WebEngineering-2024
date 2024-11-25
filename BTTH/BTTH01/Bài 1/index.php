<?php
include 'header.php';
include 'data/flowers.php';

$role = $_GET['role'] ?? 'guest';

if ($role === 'admin') {
    include 'views/admin.php';
} else {
    include 'views/guest.php';
}
?>