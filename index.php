<?php
    require __DIR__.'/Services/BookService.php';

    $bookService = new BookService();

    $books = $bookService->GetBooks();
    //test BookModel object Fill method
    foreach ($books as $book) {
        foreach ($book as $key => $value) {
          echo "$key => $value<br>";
      }
      echo '<br>';
    }
?>