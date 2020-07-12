<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Otaku Control - Home</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
</head>

<body class="textocentralizado">
    <div id="fundo">
        <img src="imagens/planodefundo.png" alt="" />
    </div>
    </div>
    <div id="site">
        <img id="logo" src="imagens/logo2.png" alt="" />
        <h3>SOBRE</h3>
        <p>Platarforma destinada na organização pessoal de quais animes você já assistiu e compartilhar comentários sobre eles com seus amigos que estiverem na plataforma.</p>
        <br>
        <br>
        <h3>MENU</h3><br>
        <?php
        session_start();
        if (isset($_SESSION["logado"]) && $_SESSION["logado"] == 'sim') {
        ?>
            <a href="cadotaku.php">OTAKUS NO CONTROL</a><br><br><br>
            <a href="visualizaanimes.php">ANIMES NO CONTROL</a><br><br><br>
            <a href="cadanime.php">CADASTRE UM ANIME</a><br><br><br>
            <a href="login.php">LOGOUT</a><br><br><br>
        <?php
        } else {
            echo "<a href='cadotaku.php'>CADASTRE-SE</a><br><br><br>";
            echo "<a href='login.php'>FAÇA LOGIN</a><br><br><br>";
        }
        ?>
        <div class="footer">
            <p class="textocentralizado">Projeto desenvolvido por Fantasia e Longhi - <strong>Faghi.Inc</strong></p>
        </div>
    </div>
</body>


</html>