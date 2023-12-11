<?php
    require __DIR__.'/../Data/DatabaseConnection.php';
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
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <title>Üye Ekle</title>
    <link rel="stylesheet" href="../Assets/Styles/style.css">
  </head>
  <body>
    <div class="contatiner">
      <div class="add-book">
        <h1 class="text-white" style="text-align: center">Üye Ekle</h1>
        <form class="form text-white" action="AddUser.php" method="post">
          <div class="form-group">
            <label>Adı:</label>
            <input
              type="text"
              class="form-control"
              placeholder="Adı"
              name="Name"
              required
            />
          </div>
          <div class="form-group">
            <label>Soyadı:</label>
            <input
              type="text"
              class="form-control"
              placeholder="Soyadı"
              name="Surname"
              required
            />
          </div>
          <div class="form-group d-flex justify-content-center">
            <button name="AddUser" type="submit" class="btn btn-primary mt-3 w-50">
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