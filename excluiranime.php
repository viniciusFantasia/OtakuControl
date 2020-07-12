<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Otaku Control</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
</head>

<body class="textocentralizado">
    <div id="fundo-externo">
        <div id="fundo">
            <img src="imagens/otakucontrol.jpg" alt="" />
        </div>
    </div>
    <div id="site">
        <img id="logo" src="imagens/logo2.png" alt="" />
        <?php
        if (isset($_GET['IDAnime']) && isset($_GET['IDOtaku'])) {
            $IDAnime = $_GET['IDAnime'];
            $IDOtaku = $_GET['IDOtaku'];

            //montar a instrução SQL
            $sql = "delete from TBAnimes where IDAnime=$IDAnime AND IDOtaku=$IDOtaku";
            //echo $sql;
            require_once "conexao.php";
            $conn->exec($sql);
            echo "<p>Anime excluido com sucesso!</p>";
        } else {
            echo "<p> Erro aos receber os dados!!! <p>";
        }
        ?>
        <br>
        <a href="cadanime.php">Voltar</a><br><br>
        <a href="home.php">Home</a><br>
    </div>
</body>

</html>