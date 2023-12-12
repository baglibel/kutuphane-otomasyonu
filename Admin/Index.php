<?php require_once 'SessionControl.php'; ?>

<!DOCTYPE html>
<html lang="tr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Yönetim</title>
    </head>
    <body>

        <?php     
            require_once __DIR__.'../../Services/BookService.php';
            require_once __DIR__.'../../Services/UserService.php';
            require_once __DIR__.'../../Services/AdminService.php';

            $bookService = new BookService();
            $userService = new UserService();
            $adminService = new AdminService();

            echo '<h1>Kullanıcılar</h1>';

            $users = $userService->GetUsers();
            foreach($users as $key => $value){
                echo strval($value);
                echo '<br>';
            }

            echo '<h1>Kitaplar</h1>';

            $books = $bookService->GetBooks();
            foreach($books as $key => $value){
                echo strval($value);
                echo '<br>';
            }

            echo '<h1>Adminler</h1>';

            $admins = $adminService->GetAdmins();
            foreach($admins as $key => $value){
                echo strval($value);
                echo '<br>';
            }
            echo '<h1>İstatistikler</h1>';
            $count = $bookService->GetBookCount();
            echo 'Toplam kitap sayısı: '.$count;
            echo '<br>';
            $count = $userService->GetUserCount();
            echo 'Toplam kullanıcı sayısı: '.$count;
        ?>
        <hr>
        <a href="AddAdmin.php">Admin Ekle</a><br>
        <a href="AddBook.php">Kitap Ekle</a><br>
        <a href="AddUser.php">Kullanıcı Ekle</a><br>
        <a href="LogOut.php">Çıkış yap</a>
    </body>
</html>
