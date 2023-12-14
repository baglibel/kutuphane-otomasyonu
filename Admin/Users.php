<?php
  require_once 'SessionControl.php';
  require_once 'NavBar.php';
  require_once '../Services/UserService.php';
  $userService = new UserService();
  if (isset($_GET["action"]) && isset($_GET["id"])){
    $id = $_GET["id"];
    if ($_GET["action"] == "delete"){
      $userService->DeleteUserByID($id);
    }
  }
  $users = $userService->GetUsers();
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
      <h2 class="center-align">Üyeler</h2>
      <table class="stripes top-margin">
        <thead>
          <tr>
            <th>ID</th>
            <th>Adı</th>
            <th>Soyadı</th>
            <th>Kayıt tarihi</th>
            <th>İşlemler</th>
          </tr>
        </thead>
        <tbody>
        <?php
        foreach ($users as $user) {
          $tarih = $user->RegistryDate->format('Y-m-d H:i:s');
            echo "<tr>
            <td>$user->ID</td>
            <td>$user->Name</td>
            <td>$user->Surname</td>
            <td>$tarih</td>
            <td style=\"width:25%\">
              <button onclick='location.href=\"EditUser.php?id=$user->ID\"';>
                <i>edit</i>
                <span>Düzenle</span>
              </button>
              <button onclick='location.href=\"Users.php?action=delete&id=$user->ID\"';>
                <i>remove</i>
                <span>Sil</span>
              </button>
            </td>
          </tr>";
        } 
        ?>
        </tbody>
      </table>
    </main>
  </body>
</html>
