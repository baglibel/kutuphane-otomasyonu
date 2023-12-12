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
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <title>Giriş Yap</title>
    <link rel="stylesheet" href="../Assets/Styles/style.css">
  </head>
  <body>
    <div class="contatiner">
      <div class="add-book">
        <h1 class="text-white" style="text-align: center">Giriş Yap</h1>
        <form class="form text-white" action="LogIn.php" method="post">
          <div class="form-group">
            <label>Kullanıcı adı:</label>
            <input
              type="text"
              class="form-control"
              placeholder="Kullanıcı adı"
              name="Username"
              required
            />
          </div>
          <div class="form-group">
            <label>Şifre:</label>
            <input
              type="password"
              class="form-control"
              placeholder="Şifre"
              name="Password"
              required
            />
          </div>
          <div class="form-group d-flex justify-content-center">
            <button name="LogIn" type="submit" class="btn btn-primary mt-3 w-50">
              Giriş yap
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
