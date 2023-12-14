<?php
    require_once 'SessionControl.php';
    require_once 'NavBar.php';
    require_once '../Services/UserService.php';
    $userService = new UserService();
    if (isset($_GET["id"])){
      $id = $_GET["id"];
      $user = $userService->GetUserByID($id);
      if (!$user){
        header("Location: Users.php");
      }
    }
    if(isset($_POST["EditUser"]) && isset($_GET["id"])){
      $id = $_GET["id"];
      $user = (new UserModel())->Fill($_POST);
      $userService->UpdateUserByID($id, $user);
      header("Location: Users.php");
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
      <h2 class="center-align">Üye Düzenle</h2>
      <form style="width: 50%; margin-top: 30px" class="responsive" action="EditUser.php?id=<?php echo $id;?>" method="post">
        <div class="field border round label">
          <input type="text" name="ID" value="<?php echo $id;?>" required disabled/>
          <label>ID</label>
        </div>
        <div class="field border round label">
          <input type="text" name="Name" value="<?php echo $user->Name;?>" required />
          <label>Adı</label>
        </div>
        <div class="field border round label">
          <input type="text" name="Surname" value="<?php echo $user->Surname;?>" required/>
          <label>Soyadı</label>
        </div>
          <button style="margin-bottom: 10px;" name="EditUser" type="submit">Düzenle</button>
        </div>
      </form>
    </main>
  </body>
</html>
