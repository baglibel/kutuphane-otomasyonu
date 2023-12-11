<?php

    require __DIR__.'/Data/DatabaseConnection.php';
    require __DIR__.'/Services/BookService.php';
    require __DIR__.'/Services/UserService.php';
    require __DIR__.'/Services/AdminService.php';

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
    // $result = $bookService->GetBookUser(47);
    // var_dump($result);

    //$bookService->GiveBookToUser(14, 12, 1);
    //$bookService->GiveBookToUser(47, 12, 1);
    //$bookService->TakeBookFromUser(47);
    // $user = $userService->GetUserByID(12);
    // echo $user->Name;
    // $user->Name = "Dua";
    // $userService->UpdateUserByID($user->ID, $user);
    // $user = $userService->GetUserByID(12);
    // echo $user->Name;

    // $books = $bookService->GetBooks();
    // //test BookModel object Fill method
    // foreach ($books as $book) {
    //     foreach ($book as $key => $value) {
    //       echo "$key => $value<br>";
    //   }
    //   echo '<br>';
    // }
    
?>