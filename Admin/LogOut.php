<?php
    require_once '../Services/AdminService.php';
    $adminService = new AdminService();
    $result = $adminService->LogOut();
    header("Location: Login.php");
?>