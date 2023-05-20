<?php
    session_start();   
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home | Onbook</title>
    <link rel="stylesheet" href="./assets/style.css">
    <link rel="shortcut icon" href="./assets/favicon.ico" type="image/x-icon">
</head>
<body>
      <?php
        include "./src/view/header.php";
      ?>
        
        <main>
          <?php
            include "./src/view/main.php"
          ?>
        </main> 
    <main> 

    </main>

    <script src="./js/script.js"></script>
</body>
</html>