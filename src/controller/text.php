<?php
    session_start();

    include "../model/connect.php";
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $texto = $_POST['texto'];
        $id_auth = $_POST['id_auth'];
    
        // Preparando a consulta SQ
        $sql = "INSERT INTO texts (id_auth, texts) VALUES ('$id_auth', '$texto')";

        // Executando a consulta SQL
        if (mysqli_query($conn, $sql)) {
            $_SESSION['texto'] = $texto;
        echo "Texto inserido com sucesso no banco de dados!";
        } else {
        echo "Erro ao inserir o texto no banco de dados: " . mysqli_error($conn);
        }
    }

// Fechando a conexão com o banco de dados
mysqli_close($conn);
    
?>