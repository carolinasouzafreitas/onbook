<?php
    include "../model/connect.php";

    $sql = "SELECT COUNT(id) FROM texts GROUP BY id_auth ORDER BY COUNT(id) DESC";

    if(mysqli_connect($conn, $slq )){
        echo "Deu certo";

    }else {
        echo "Não deu certo" .mysqli_error($conn);
    }
?>
