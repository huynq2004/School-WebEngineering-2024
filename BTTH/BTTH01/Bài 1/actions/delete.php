<?php
include '../data/flowers.php'; 

$id = $_GET['id'] ?? '';

foreach ($flowers as $index => $flower) {
    if ($flower['id'] == $id) {
        unset($flowers[$index]);  
        break;
    }
}

$flowers = array_values($flowers);  

header('Location: actions.php?action=delete');
exit;
?>
