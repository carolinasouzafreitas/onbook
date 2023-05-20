<?php 
      if(empty($_SESSION['token_auth'])){
    ?>

    <!--SE NÃO HÁ LOGIN-->

        <nav>
            <img src="./assets/logo-header.png" class="logo" >

            <ul class="nav-list">
                <li><a class="li-nav" href="ranking.php">Ranking</a></li>
                <li><a class="li-nav" href="./src/view/login.php">Entrar</a></li>
                
            </ul>
        </nav>
<?php
      }else{
        require './src/model/connect.php';
        if(isset($_SESSION['token_auth'])){
          $user = $_SESSION['token_auth'];
          $sql = "SELECT * FROM auth WHERE email = '$user'";
          $result = $conn->query($sql);
          $row = $result->fetch_assoc();
        }
      ?>
      <!--SE JÁ HÁ LOGIN-->
        <nav>
            <img src="./assets/logo-header.png" class="logo">

            <ul class="nav-list">
                <li><a class="li-nav" href="ranking.php">Ranking</a></li>
                <li><a class="li-nav" href="oficina.php">Oficina</a></li>
                <li><a class="li-nav" href="textos.php">Textos</a></li>
            </ul>
                <!-- INFORMAÇÂO DE USUÁRIO -->
            
                  <div id="profile" class="profile">
                      <?php
                          $emailtoken = $_SESSION['token_auth'];
                          $select = mysqli_query($conn, "SELECT * FROM auth WHERE email = '$emailtoken'");
                            if(mysqli_num_rows($select) > 0){
                            $fetch = mysqli_fetch_assoc($select);
                          }

                          if($row['imagem'] == ''){
                            echo '<img src="./assets/default-avatar.png">';
                          }else{
                            echo '<img src="./assets/uploads/'.$row['imagem'].'">';
                          }
                      ?>
                  </div>
                    
            <div id="menuUser" class="sub-menu-wrap" style="display: none">
                  <h3> <?php echo $row['usuario']; ?></h3>
                  <h3> <?php echo $row['email']; ?> </h3>
                  <a href="./src/controller/exit.php" class="delete-btn">Sair</a>
            </div>

        </nav>  
<?php
      }
?>