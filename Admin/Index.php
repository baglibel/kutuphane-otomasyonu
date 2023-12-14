<?php 
  require_once 'SessionControl.php';
  require_once 'NavBar.php';
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
      <h2 class="center-align">Kütüphane Otomasyon Sistemi</h2>
    </main>
  </body>
</html>
