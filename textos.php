<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seus textos | Onbook</title>
    <link rel="shortcut icon" href="assets/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    

    <?php 
    include "src/view/header.php"
    ?>
    

    <main class="main-text">
        <div class="div-text">
        <h1 class="h1-all">Seus Textos</h1>

        <?php
            require "src/model/connect.php";
            
            $author = $_SESSION['token_auth'];

                // Prepare the SQL query to fetch the texts for the logged-in user
                $sql = "SELECT * FROM texts WHERE id_auth = '$author'";

                // Execute the SQL query
                $result = mysqli_query($conn, $sql);

                // Check if any texts were found
                if (mysqli_num_rows($result) > 0) {
                    // Loop through each row and display the texts
                    while ($row = mysqli_fetch_assoc($result)) {               
                    ?>
                    <div class="y-texts">
                        <p class="p-text"><?= $row['texts'] ?></p>
                    </div>
                    <?php
                    }
                } else {
                    echo "<p class='p-text'>Você ainda não escreveu nenhum texto</p>";
                }

                // Close the database connection
                mysqli_close($conn);
        ?>
        </div>
    </main>
</body>
</html>