<?php
    require_once 'SessionControl.php';
    require_once 'NavBar.php';
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
  <?php NavBar( $adminObject);?>
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
