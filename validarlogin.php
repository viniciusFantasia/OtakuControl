<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Otaku Control</title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="textocentralizado">
    <h1>Otaku Control</h1>
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
                $_SESSION["Nome"] = $linha['Nome'];
                echo "<p>Seja vem vindo(a) " . $_SESSION["Nome"] . " !</p><br>";
                echo "<a href='cadotaku.php'>Perfil</a><br>";
                echo "<a href='cadanime.php'>Cadastro de Animes</a><br>";
            }
        } else {
            $_SESSION["logado"] = 'não';
            $_SESSION["idusuario"] = 0;
            echo "<p>Usuário ou senha inválidos.</p>";
        }
    } else {
        echo "<p>Erro ao receber dados</p>";
        echo "<a href='cadotaku.php'>Cadastre-se</a>";
        echo "  ou  ";
        echo "<a href='login.php'>Faça o login</a>";
    }
    ?>
    </table>
    <a href="home.php">Voltar</a><br>
</body>

</html>