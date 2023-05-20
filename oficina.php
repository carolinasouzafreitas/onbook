<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>oficina | Onbook</title>
    <link rel="shortcut icon" href="./assets/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="./assets/style.css">
    <link rel="stylesheet" href="./dist/trumbowyg.min.css">

    <style>
        .counter {
            font-size: 12px;
            color: #999;
        }

    </style>
</head>
<body>
    <header>

        <?php
            include "./src/view/header.php";
        ?>    

    </header>

    <form action="./src/controller/text.php" method="POST">
        <input type="hidden" name="id_auth" value="<?= $_SESSION['token_auth'] ?>">
        <div class="conteudo-h3">
            <h3>Conteúdo</h3><br>
        </div>
            <textarea id="texto" name="texto" maxlength="1000" rows="5" cols="50" placeholder="Conteúdo do seu texto"></textarea>
            <p style="text-align:center; padding-top:20px">no maximo 1000 caracteres</p>
        <div class="btn-editor">
            <input type="submit" value="Enviar">
        </div>
       
    </form>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/script.js"></script>
    <script src="./dist/trumbowyg.min.js"></script>
    

    <script>
            $('#texto').trumbowyg({
        btns:
            [
                ['viewHTML'],
                ['undo', 'redo'], // Only supported in Blink browsers
                ['formatting'],
                ['strong', 'em', 'del'],
                ['superscript', 'subscript'],
                ['link'],
                ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
                ['unorderedList', 'orderedList'],
                ['horizontalRule'],
                ['fullscreen']
            ],
        autogrow: true
        });
        </script>
</body>
</html>