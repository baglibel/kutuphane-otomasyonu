<?php
    require_once 'SessionControl.php';
    if(isset($_POST["AddUser"])){
      require_once '../Services/UserService.php';
      $userService = new UserService();
      $user = (new UserModel())->Fill($_POST);
      $userService->AddUser($user);
      $message = "Üye eklendi.";
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
    <nav class="left drawer">
      <header>
        <nav>
          <img
            src="https://cdn-icons-png.flaticon.com/512/224/224595.png"
            class="circle"
            alt="library logo"
          />
          <h6>Kütüphane</h6>
        </nav>
      </header>
      <a href="Index.php">
        <i>home</i>
        <div>Ana Sayfa</div>
      </a>
      <a href="Books.php">
        <i>book</i>
        <div>Kitaplar</div>
      </a>
      <a href="Users.php">
        <i>person</i>
        <div>Üyeler</div>
      </a>
      <a>
        <i>Analytics</i>
        <div>İstatistikler</div>
      </a>
      <a>
        <i>priority_high</i>
        <div>Uyarılar</div>
      </a>
      <div class="divider"></div>
      <label>Üye İşlemleri</label>
      <a class="active" href="AddUser.php">
        <i>person_add</i>
        <div>Üye Ekle</div>
      </a>
      <div class="divider"></div>
      <label>Kitap İşlemleri</label>
      <a href="AddBook.php">
        <i>book</i>
        <div>Kitap Ekle</div>
      </a>
    </nav>
    <main class="responsive center-align" style="display: flex; align-items: center; justify-content: center; flex-direction: column;">
      <h2 class="center-align">Üye Ekle</h2>
      <form style="width: 50%; margin-top: 30px" class="responsive" action="AddUser.php" method="post">
        <div class="field border round label">
          <input type="text" name="Name" required />
          <label>Adı</label>
        </div>
        <div class="field border round label">
          <input type="text" name="Surname" required/>
          <label>Soyadı</label>
        </div>
          <button style="margin-bottom: 10px;" name="AddUser" type="submit">Ekle</button>
        </div>
      </form>
      <?php if (isset($message)) echo $message; ?>
    </main>
  </body>
</html>
