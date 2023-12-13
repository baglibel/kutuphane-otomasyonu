<?php
    if(isset($_POST["LogIn"])){
        require_once '../Services/AdminService.php';
        $adminService = new AdminService();
        $admin = (new AdminModel())->Fill($_POST);
        $result = $adminService->LogIn($admin);
        if ($result[0]){
            header("Refresh:2; url=Index.php");
        }
        $message = $result[1];
    }
?>

<!DOCTYPE html>
<html lang="tr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Giriş Yap</title>
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
    <style>
      body {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
        background-image: url('../Assets/Images/background.png');
        color: white;
      }
      .container {
        flex: display;
        justify-content: center;
        align-items: center;
        padding: 50px;
        border-radius: 10%;
      }
    </style>
  </head>
  <body>
    <div class="container brown9">
      <h1 class="text-white" style="text-align: center">Giriş Yap</h1>
      <form class="form text-white" action="LogIn.php" method="post">
        <div class="field border round label">
          <input type="text" class="form-control" name="Username" required />
          <label>Kullanıcı adı</label>
        </div>
        <div class="field border round label">
          <input
            type="password"
            class="form-control"
            name="Password"
            required
          />
          <label>Şifre</label>
        </div>
        <div class="form-group d-flex justify-content-center">
          <button name="LogIn" type="submit" class="btn btn-primary mt-3 w-50">
            Giriş yap
          </button>
        </div>
        <?php if (isset($message)) echo $message; ?>

      </form>
    </div>
  </body>
</html>
