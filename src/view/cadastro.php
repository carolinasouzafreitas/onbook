<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cadastro | Onbook</title>
    <link rel="stylesheet" type="text/css" href="../../assets/cad.css">
    <link rel="shortcut icon" href="../../assets/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
</head>
<body>
    <main>
            
        <?php
            if(empty($_SESSION['token_auth'])){
        ?>
        <!--SE NÃO HÁ LOGIN-->
        <h1>Criar Conta</h1>
        <form action="../controller/register.php" method="post" enctype="multipart/form-data">
            <p style="color:red;" id="erro">Usuário já cadastrado</p>
            <p style="color:red;" id="erro2">As senhas diferem</p>
            <p style="color:red;" id="erro3">Tamanho da imagem excedido</p>
            <p style="color:red;" id="erro4">Cadastro falhou</p>
            <label for="name">
                <span>Usuário</span>
                <div>
                <input type="text" id="name" name="usuario" class="input-normal" required>
            </div>
            </label>

            <label for="email">
                <span>Email</span>
                <div>
                <input type="email" id="email" name="email" class="input-normal" required>
            </div>
            </label>

           <label for="password">
                <span>Senha</span>
                <div>
                    <input type="password" id="password" name="senha" class="input-normal" required>
                    <span class="lnr lnr-eye"></span>
                </div>
            </label>

            <label for="cpassword">
                <span>Confirmar Senha</span>
                <div>
                    <input type="password" id="password" name="csenha" class="input-normal" required>
                    <span class="lnr lnr-eye"></span>
                </div>
            </label>

            <label for="imgUserPerfil">
                <span>Sua Foto</span>
                <div>
                    <input type="file" id="" name="imgUserPerfil" accept="image/jpg, image/jpeg, image/png">
                 
                </div>
            </label>
<h2>
            <button type="submit" name="submit" >Cadastrar</button>
        </h2>
        </form>
        <!--  ERRO 1 -->
    <?php
        if(empty($_SESSION['verif_erro'])){
    ?>
    <script>
        document.getElementById('erro').style.display = "none";
    </script>
    <?php
        }else{
    ?>
    <script>
         document.getElementById('erro').style.display = "block";
    </script>
    <?php
    unset($_SESSION['verif_erro']);
    }
    ?>
       <!-- ERRO 2 -->
       <?php
        if(empty($_SESSION['verif_erro2'])){
    ?>
    <script>
        document.getElementById('erro2').style.display = "none";
    </script>
    <?php
        }else{
    ?>
    <script>
         document.getElementById('erro2').style.display = "block";
    </script>
    <?php
    unset($_SESSION['verif_erro2']);
    }
    ?>

     <!-- ERRO 3 -->
     <?php
        if(empty($_SESSION['verif_erro3'])){
    ?>
    <script>
        document.getElementById('erro3').style.display = "none";
    </script>
    <?php
        }else{
    ?>
    <script>
         document.getElementById('erro3').style.display = "block";
    </script>
    <?php
    unset($_SESSION['verif_erro3']);
    }
    ?>

     <!-- ERRO 4 -->
     <?php
        if(empty($_SESSION['verif_erro4'])){
    ?>
    <script>
        document.getElementById('erro4').style.display = "none";
    </script>
    <?php
        }else{
    ?>
    <script>
         document.getElementById('erro4').style.display = "block";
    </script>
    <?php
    unset($_SESSION['verif_erro4']);
    }
    ?>

    </main>
    <section class="images">
        <div class="circle"></div>
    </section>
        <?php
            }else{
                require '../model/connect.php';
            if(isset($_SESSION['token_auth'])){
          $user = $_SESSION['token_auth'];
          $sql = "SELECT * FROM auth WHERE id = '$user'";
            }
        
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            
            header('location:../../index.php');
            }
        ?>
</body>
<script type="text/javascript">

    let btn = document.querySelector('.lnr-eye');

    btn.addEventListener('click', function() {
        let input = document.querySelector('#password');

        if(input.getAttribute('type') == 'password') {
            input.setAttribute('type', 'text');
        }else {
            input.setAttribute('type', 'password');
        }
    });
</script>
</html>
