<?php
  require_once 'SessionControl.php';
  require_once 'NavBar.php';
  require_once '../Services/BookService.php';
  require_once '../Services/UserService.php'; 
  $bookService = new BookService();
  $userService = new UserService();
  $adminService = new AdminService();
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
      <h2 class="center-align">İstatistikler</h2>
      <article style="display: flex; align-items:start; justify-content:center; flex-direction: column; gap: 10px">
        <span class="chip">Toplam Kitap sayısı: <?php echo $bookService->GetBookCount(); ?></span>
        <span class="chip">Toplam Kullanıcı sayısı: <?php echo $userService->GetUserCount(); ?></span>
        <span class="chip">Toplam Admin sayısı: <?php echo count($adminService->GetAdmins());  ?></span>

      </article>

    </main>
  </body>
</html>
