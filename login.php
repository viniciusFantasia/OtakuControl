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
            <img src="imagens/planodefundo.png" alt="" />
        </div>
    </div>
    <div id="site">
        <img id="logo" src="imagens/logo2.png" alt="" />
        <h3>Login</h3><br>
        <?php
        session_start();
        session_destroy();
        ?>
        <form name="form1" action="validarlogin.php" method="POST">
            <label>Email</label><br><input type="text" name="Email" value="" placeholder="Digite seu E-mail" required><br><br>
            <label>Senha</label><br><input type="password" name="Senha" value="" placeholder="Digite sua Senha" required><br><br>
            <br><br>
            <input type="submit" value="ENTRAR">
        </form>
        <br>
        <a href='cadotaku.php'>CADASTRE-SE</a>
        <a href="home.php">HOME</a><br><br>
    </div>
</body>

</html>