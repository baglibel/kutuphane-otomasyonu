<?php
    require_once 'SessionControl.php';
    require_once 'NavBar.php';
    require_once '../Services/BookService.php';
    $bookService = new BookService();
    if (isset($_GET["id"])){
      $id = $_GET["id"];
      $book = $bookService->GetBookByID($id);
      if (!$book){
        header("Location: Books.php");
      }
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
      <h2 class="center-align">Kitap Düzenle</h2>
      <form style="width: 50%; margin-top: 30px" class="responsive" action="EditBook.php?id=<?php echo $id;?>" method="post">
          <div class="field border round label">
            <input
            type="text"
            name="ID"
            value="<?php echo $id ?>"
            required
            disabled
            />
            <label>ID</label>
          </div>   
          <div class="field border round label">
            <input
            type="text"
            name="Name"
            value="<?php echo $book->Name ?>"
            required
            />
            <label>Kitap adı</label>
          </div>
          <div class="field border round label">
            <input
            type="text"
            name="Writer"
            value="<?php echo $book->Writer ?>"
            required
            />
            <label>Yazar</label>
          </div>
          <div class="field border round label">
            <input
            type="url"
            name="Cover"
            value="<?php echo $book->Cover ?>"
            required
            />
            <label>Kapak (URL)</label>
          </div>
          <div class="field textarea round border label">
            <textarea 
            type="textarea"
            name="Description"
            required><?php echo $book->Description ?>
          </textarea>
            <label>Açıklama</label>
          </div>
          <div class="field border round label">
            <input
            type="number"
            name="NumberOfPages"
            value="<?php echo $book->NumberOfPages ?>"
            required
            />
            <label>Sayfa sayısı</label>
          </div>
          <div class="field border round label">
            <input
            type="text"
            name="Publisher"
            value="<?php echo $book->Publisher ?>"
            required
            />
            <label>Yayın evi</label>
          </div>
          <div>
            <button name="EditBook" type="submit">
              Düzenle
            </button>
        </div>
      </form>
    </main>
  </body>
</html>
