<?php

include '../model/connect.php';

if(isset($_POST['submit'])){

   $usuario = mysqli_real_escape_string($conn, $_POST['usuario']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, ($_POST['senha']));
   $cpass = mysqli_real_escape_string($conn, ($_POST['csenha']));
   $image = $_FILES['imgUserPerfil']['name'];
   $image_size = $_FILES['imgUserPerfil']['size'];
   $image_tmp_name = $_FILES['imgUserPerfil']['tmp_name'];
   $image_folder = '../../assets/uploads/'.$image;

   $select = mysqli_query($conn, "SELECT * FROM auth WHERE email = '$email' AND senha = '$pass'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $_SESSION['verif_erro'] = 'error';
      header('location: ../view/cadastro.php'); 
   }else{
      if($pass != $cpass){
        $_SESSION['verif_erro2'] = 'error';
        header('location: ../view/cadastro.php');
      }elseif($image_size > 2000000){
        $_SESSION['verif_erro3'] = 'error';
        header('location: ../view/cadastro.php');
      }else{
         $insert = mysqli_query($conn, "INSERT INTO  auth (usuario, email, senha, imagem, data_registro) VALUES('$usuario', '$email', '$pass', '$image', NOW())");

         if($insert){
            move_uploaded_file($image_tmp_name, $image_folder);
            header('location: ../view/login.php');
         }else{
            $_SESSION['verif_erro4'] = 'error';
            header('location: ../view/cadastro.php');
         }
      }
   }

}

?>
