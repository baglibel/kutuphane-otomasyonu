<?php
    require_once 'SessionControl.php';
    if(isset($_POST["AddBook"])){
      require_once '../Services/BookService.php';
      $bookService = new BookService();
      $book = (new BookModel())->Fill($_POST);
      $bookService->AddBook($book);
      $message = "Kitap eklendi.";
    }
?>

<!DOCTYPE html>
<html lang="tr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <title>Kitap Ekle</title>
    <link rel="stylesheet" href="../Assets/Styles/style.css">
  </head>
  <body>
    <div class="contatiner">
      <div class="add-book">
        <h1 class="text-white" style="text-align: center">Kitap Ekle</h1>
        <form class="form text-white" action="AddBook.php" method="post">
          <div class="form-group">
            <label>Kitap adı:</label>
            <input
              type="text"
              class="form-control"
              placeholder="Kitap adı"
              name="Name"
              required
            />
          </div>
          <div class="form-group">
            <label>Yazar:</label>
            <input
              type="text"
              class="form-control"
              placeholder="Yazar"
              name="Writer"
              required
            />
          </div>
          <div class="form-group">
            <label>Kapak (URL):</label>
            <input
              type="url"
              class="form-control"
              placeholder="Kapak (URL)"
              name="Cover"
              required
            />
          </div>
          <div class="form-group">
            <label>Açıklama:</label>
            <input
              type="text"
              class="form-control"
              placeholder="Açıklama"
              name="Description"
              required
            />
          </div>
          <div class="form-group">
            <label>Sayfa sayısı:</label>
            <input
              type="number"
              class="form-control"
              placeholder="Sayfa sayısı"
              name="NumberOfPages"
              required
            />
          </div>
          <div class="form-group">
            <label>Yayın evi:</label>
            <input
              type="text"
              class="form-control"
              placeholder="Yayın evi"
              name="Publisher"
              required
            />
          </div>
          <div class="form-group d-flex justify-content-center">
            <button name="AddBook" type="submit" class="btn btn-primary mt-3 w-50">
              Ekle
            </button>
        </div>
    </form>
        <?php if (isset($message)) echo $message; ?>
      </div>
    </div>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
