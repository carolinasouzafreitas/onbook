<?php
    session_start();
    include ('../model/connect.php');

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM auth WHERE email = '$email' AND senha = '$senha'";
    $result = $conn->query($sql);


    if(empty($_SESSION['token_auth'])){
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

    if($email == $row['email'] && $senha == $row['senha']){
        $_SESSION['token_auth'] = $email;
        header("location: ../../index.php");
    }
    elseif($row['senha'] == $senha){
        $_SESSION['token_auth'] = $email;
        header("location: ../../index.php");
    }else{
        $_SESSION['verif_erro2'] = 'error';
        header('location: ../view/login.php');
    }
}else{
    $_SESSION['verif_erro'] = 'error';
    header('location: ../view/login.php');
}
}

?>