<?php

    require __DIR__.'/Data/DatabaseConnection.php';
    require __DIR__.'/Services/BookService.php';
    require __DIR__.'/Services/UserService.php';

    $bookService = new BookService();
    $userService = new UserService();

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