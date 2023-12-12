<?php
    require_once '../Services/AdminService.php';
    $adminService = new AdminService();
    $adminObject = $adminService->IsLogged();
?>