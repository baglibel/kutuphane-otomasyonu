<?php
    require_once 'SessionControl.php';
    require_once 'NavBar.php';
    $adminService->checkAdminRank($adminObject, Rank::Yönetici);
    if(isset($_POST["AddAdmin"])){
      $admin = (new AdminModel())->Fill($_POST);
      $adminService->AddAdmin($admin);
      $message = "Admin eklendi.";
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
      <h2 class="center-align">Admin Ekle</h2>
      <form style="width: 50%; margin-top: 30px" class="responsive" action="AddAdmin.php" method="post">
          <div class="field border round label">
            <input
            type="text"
            name="Name"
            required
            />
            <label>Ad</label>
          </div>
          <div class="field border round label">
            <input
            type="text"
            name="Surname"
            required
            />
            <label>Soyad</label>
          </div>
          <div class="field border round label">
            <input
            type="text"
            name="Username"
            required
            />
            <label>Kullanıcı adı</label>
          </div>
          <div class="field border round label">
            <input
            type="password"
            name="Password"
            required
            />
            <label>Şifre</label>
          </div>
          <div class="field border round label">
            <input
            type="email"
            name="Email"
            required
            />
            <label>Email</label>
          </div>
          <div class="field border round label">
            <select class="form-select" name="Rank" required>
              <option value="0">Moderatör</option>
              <option value="1">Yönetici</option>
            </select>
            <label>Yetki:</label>
          </div>
          <div>
            <button name="AddAdmin" type="submit">
              Ekle
            </button>
        </div>
      </form>
      <?php if (isset($message)) echo $message; ?>
    </main>
  </body>
</html>
