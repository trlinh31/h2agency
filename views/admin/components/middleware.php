<?php 
    session_start();
    $role = $_SESSION['role'];
    if ($role !== "admin") {
        header("Location: {$base_path}/dang-nhap");
        exit();
    }
?>