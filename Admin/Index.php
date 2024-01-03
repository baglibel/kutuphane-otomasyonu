<?php 
  require_once 'SessionControl.php';
  require_once 'NavBar.php';
  require_once '../Services/BookService.php';
  require_once '../Services/UserService.php';
  $bookService = new BookService();
  $userService = new UserService();
  if(isset($_POST["GiveBook"])){
    $bookService->GiveBookToUser($_POST["Book"], $_POST["User"], $adminObject->ID);
  }
  if(isset($_POST["TakeBook"])){
    $bookService->TakeBookFromUser($_POST["Book"]);
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kütüphane</title>
    <link
      href="https://cdn.jsdelivr.net/npm/beercss@3.4.9/dist/cdn/beer.min.css"
      rel="stylesheet"
    />
    <script
      type="module"
      src="https://cdn.jsdelivr.net/npm/beercss@3.4.9/dist/cdn/beer.min.js"
    ></script>
    <script
      type="module"
      src="https://cdn.jsdelivr.net/npm/material-dynamic-colors@1.1.0/dist/cdn/material-dynamic-colors.min.js"
    ></script>
  </head>
  <body class="dark brown9">
    <?php NavBar( $adminObject);?>
    <main class="responsive center-align">
      <h2 class="center-align">Kütüphane Otomasyon Sistemi</h2>
      <article style="display: flex; align-items:start; justify-content:center; flex-direction: column; gap: 10px; min-height: 100px">
        <form class="responsive" name="GiveBook" action="Index.php" method="post">
          <h3 class="center-align">Kitap ver</h3>
          <div class="field border round label">
            <select class="form-select" name="Book" required>
              <?php 
                  $books = $bookService->GetBooks();
                  foreach ($books as $book) 
                    if ($book->IsFree == true)
                      echo "<option value='$book->ID'>$book</option>";
                ?>
              </select>
            <label>Kitap:</label>
          </div>
          <div class="field border round label">
            <select class="form-select" name="User" required>
              <?php 
                  $users = $userService->GetUsers();
                  foreach ($users as $user) 
                    echo "<option value='$user->ID'>$user</option>";
                ?>
              </select>
            <label>Kullanıcı:</label>
          </div>
          <button name="GiveBook" type="submit">Ver</button>
        </form>
        <div style=" background-color:gray; height: 5px; margin: 40px 0 " class="responsive"></div>
        <form  class="responsive" name="TakeBook" action="Index.php" method="post">
          <h3 class="center-align">Kitap Al</h3>
          <div class="field border round label">
            <select class="form-select" name="Book" required>
              <?php 
                  $books = $bookService->GetBooks();
                  foreach ($books as $book)
                    if ($book->IsFree == false)
                      echo "<option value='$book->ID'>$book</option>";
                ?>
              </select>
            <label>Kitap:</label>
          </div> 
          <button name="TakeBook" type="submit">Al</button>
        </form>
      </article>
    </main>
  </body>
</html>
