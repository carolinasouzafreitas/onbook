<?php
    include "../model/connect.php";

    $sql = "SELECT COUNT(id) FROM texts GROUP BY id_auth ORDER BY COUNT(id) DESC";

    if(mysqli_connect($conn, $slq )){
        echo "deu certo";

    }else {
        echo "n deu certo" .mysqli_error($conn);
    }
?>