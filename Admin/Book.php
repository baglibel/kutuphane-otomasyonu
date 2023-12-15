<?php
    require_once 'SessionControl.php';
    require_once 'NavBar.php';
    require_once '../Services/BookService.php';
    $bookService = new BookService();
    if (isset($_GET["id"])){
      $id = $_GET["id"];
      $book = $bookService->GetBookByID($id);
      if (!$book)
        header("Location: Books.php");
    }
    if(isset($_POST["EditBook"]) && isset($_GET["id"])){
      $id = $_GET["id"];
      $book = (new BookModel())->Fill($_POST);
      $bookService->UpdateBookByID($id, $book);
      header("Location: Books.php");
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
    <main class="responsive center-align" style="display: flex; align-items: center; justify-content: center; flex-direction: column;">
      <article style="width: 600px; min-height: 500px; display:flex; align-items:center; justify-content: center; flex-direction:column; padding: 20px">
        <h5 class="bottom-margin"><?php echo $book->Name; ?></h5>
        <div style="display: flex; align-items:center; justify-content: center; gap: 12px;">
          <img src="<?php echo $book->Cover; ?>" alt="<?php echo $book->Name; ?>" width="256">
          <div class="main" style="display: flex; align-items: start; justify-content: center; flex-direction: column; gap: 10px; width: 256px">
            <div class="description" style="flex: 1">
              <h5 class="center-align">Açıklama</h5>
              <span><?php echo $book->Description; ?></span>
            </div>
            <span><b>ID:</b> <?php echo $book->ID; ?></span>
            <span><b>Yazar:</b> <?php echo $book->Writer; ?></span>
            <span><b>Sayfa sayısı:</b> <?php echo $book->NumberOfPages; ?></span>
            <span><b>Yayın evi:</b> <?php echo $book->Publisher; ?></span>
            <span><b>Durum:</b> <?php echo $book->GetState(); ?></span>
          </div>
        </div>
        <nav class="center-align">
          <button onclick="location.href='EditBook.php?id=<?php echo $book->ID; ?>'";>
            <i>edit</i>
            <span>Düzenle</span>
          </button>
          <button onclick="location.href='Books.php?action=delete&id=<?php echo $book->ID; ?>'";>
            <i>remove</i>
            <span>Sil</span>
          </button>
        </nav>
      </article>
    </main>
  </body>
</html>
