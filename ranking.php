<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./assets/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="assets/style.css">
    <title>ranking | Onbook</title>
</head>
<body style="background-color: white; ">
    <?php
        session_start();

        include "src/view/header.php";

        include "src/model/connect.php";
    ?>

    <table class="ranking-table" cellspacing="20">
        <tr class="line-title">
            <th class="line-th">Classificação</th>
            <th class="line-th">Nº de textos</th>
            <th class="line-th">Escritores</th>
        </tr>

    <?php
        $sqlRank = "SELECT COUNT(id), id_auth FROM texts GROUP BY id_auth ORDER BY COUNT(id) DESC";

        $resultRank = $conn->query($sqlRank);

        if($resultRank->num_rows == 0) {

            echo "Nao ha livros";
            
        } else {
            $i = 1;

            while($rowsRank = $resultRank->fetch_assoc()) {

    ?>
            <tr class="line">
                <td ><?= $i ?>   </td>
                <td><?= $rowsRank['COUNT(id)'] ?>   </td>
                <td><?= $rowsRank['id_auth'] ?>  </td>
            </tr>
    <?php
        $i++;
                
            }
            
        }
    ?>
    </table>
    <script src="./js/script.js"></script>
</body>
</html>
