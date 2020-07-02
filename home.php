<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Otaku Control - Home</title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="textocentralizado">
    <h1>Otaku Control</h1>
    <h2>Seu biblioteca de animes favoritos!</h2>
    <p>Platarforma destinada na organização pessoal de quais animes você assistiu e compartilhar comentários sobre eles com seus amigos que estiverem na plataforma.</p>
    <br>
    <br>
    <?php
     session_start();
    if(isset($_SESSION["logado"]) && $_SESSION["logado"] == 'sim'){
    ?>
    <a href="cadotaku.php">Otakus na Área!</a><br>
    <?php 
    } else {
        echo "<a href='cadotaku.php'>Cadastre-se</a><br>";
    }
    ?>
    <a href="cadanime.php">Cadastre um Anime</a><br>
    <a href="login.php">Acesse o sistema</a><br>
    <div class="footer">
    <p class="textocentralizado">Projeto desenvolvido por Fantasia e Longhi - <strong>Faghi.Inc</strong></p>  
    </div>
</body>


</html>