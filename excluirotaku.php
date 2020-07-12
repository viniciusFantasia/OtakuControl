<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Otaku Control</title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="textocentralizado">
    <div id="fundo-externo2">
        <div id="fundo2">
            <img src="imagens/ino_shippuden.jpeg" alt="" />
        </div>
    </div>
    <div id="site">
        <img id="logo" src="imagens/logo2.png" alt="" />
        <?php
        if (isset($_GET['IDOtaku'])) {
            session_start();
            $IDOtaku = $_GET['IDOtaku'];

            //montar a instrução SQL
            $sql = "delete from TBOtaku where IDOtaku=$IDOtaku";
            //echo $sql;
            require_once "conexao.php";
            $conn->exec($sql);
            echo "<p>Excluido com sucesso</p>";
            session_destroy();
        } else {
            echo "<p> Erro aos receber os dados!!! <p>";
        }
        ?>
        <br>
        <a href="cadotaku.php">VOLTAR</a><br><br>
        <a href="home.php">HOME</a><br>
    </div>
</body>

</html>