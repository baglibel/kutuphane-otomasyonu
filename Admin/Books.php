<?php
  require_once 'SessionControl.php';
  require_once '../Services/BookService.php';
  require_once 'NavBar.php';
  $bookService = new BookService();
  if (isset($_GET["action"]) && isset($_GET["id"])){
    $id = $_GET["id"];
    if ($_GET["action"] == "delete"){
      $bookService->DeleteBookByID($id);
    }
  }
  $books = $bookService->GetBooks();
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
      <h2 class="center-align">Kitaplar</h2>
      <table class="stripes top-margin">
        <thead>
          <tr>
            <th>Adı</th>
            <th>Yazarı</th>
            <th>Sayfa sayısı</th>
            <th>Yayımcı</th>
            <th>Durum</th>
            <th>İşlem</th>
          </tr>
        </thead>
        <tbody>
        <?php
        foreach ($books as $book) {
          $durum = $book->GetState();
            echo "<tr>
            <td>$book->Name</td>
            <td>$book->Writer</td>
            <td>$book->NumberOfPages</td>
            <td>$book->Publisher</td>
            <td>$durum</td>
            <td style=\"width:35%\">
            <button>
                <i>frame_inspect</i>
                <span>İncele</span>
              </button>
              <button onclick='location.href=\"EditBook.php?id=$book->ID\"';>
                <i>edit</i>
                <span>Düzenle</span>
              </button>
              <button onclick='location.href=\"Books.php?action=delete&id=$book->ID\"';>
                <i>remove</i>
                <span>Sil</span>
              </button>
            </td>
          </tr>";
        } 
        ?>
        </tbody>
      </table>
    </main>
  </body>
</html>
