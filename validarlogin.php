<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Otaku Control</title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="textocentralizado">
<div id="fundo-externo">
        <div id="fundo">
            <img src="imagens/planodefundo.png" alt="" />
        </div>
    </div>
    <div id="site">
        <img id="logo" src="imagens/logo2.png" alt="" />
    <?php
    session_start();
    if (isset($_POST['Email']) && isset($_POST['Senha'])) {
        $Email = $_POST['Email'];
        $Senha = $_POST['Senha'];
        $sql = "Select * from TBOtaku where Email='$Email' and Senha='$Senha'";
        require_once "conexao.php";
        $result = $conn->query($sql);
        $dados = $result->fetchAll(PDO::FETCH_ASSOC);
        if ($result->rowCount() == 1) {
            foreach ($dados as $linha) {
                $_SESSION["logado"] = 'sim';
                $_SESSION["IDOtaku"] = $linha['IDOtaku'];
                $_SESSION["nomeusuario"] = $linha['Nome'];
                echo "<p>Seja vem vindo(a) " . $_SESSION["nomeusuario"] . " !</p><br><br>";
                echo "<h3>MENU</h3><br><br>";
                echo "<a href='cadotaku.php'>OTAKUS NO CONTROL</a><br><br><br>";
                echo "<a href='visualizaanimes.php'>ANIMES NO CONTROL</a><br><br><br>";
                echo "<a href='cadanime.php'>CADASTRE UM ANIME</a><br><br>";
            }
        } else {
            $_SESSION["logado"] = 'não';
            $_SESSION["IDOtaku"] = 0;
            echo "<p>Usuário ou senha inválidos.</p>";
        }
    } else {
        echo "<p>ERRO AO RECEBER OS DADOS</p>";
            echo "<a href='cadotaku.php'>CADASTRE-SE</a>";
            echo "  OU  ";
            echo "<a href='login.php'>FAÇA O LOGIN</a>";
    }
    ?>
    </table>
    <br>
    <a href="home.php">HOME</a><br>
    </div>
</body>

</html>