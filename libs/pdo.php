<?php
try {
    $db = new PDO('mysql:host=localhost;dbname=mini_blog;charset=utf8', 'root', 'admin');
} catch (Exception $e) {
    echo '<script>console.warn("' . $e->getMessage() . '")</script>';
}
?>