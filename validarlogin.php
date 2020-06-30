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
    if (isset($_POST['email']) && isset($_POST['senha'])) {
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $sql = "Select * from tbotaku where email='$email' and senha='$senha'";
        require_once "conexao.php";
        $result = $conn->query($sql);
        $dados = $result->fetchAll(PDO::FETCH_ASSOC);
        if ($result->rowCount() == 1) {
            foreach ($dados as $linha) {
                $_SESSION["logado"] = 'sim';
                $_SESSION["idusuario"] = $linha['idotaku'];
                $_SESSION["nomeusuario"] = $linha['nome'];
                echo "<p>Seja vem vindo(a) " . $_SESSION["nomeusuario"] . " !</p><br>";
                echo "<a href='cadotaku.php'>Perfil</a><br>";
                echo "<a href='cadanimes.php'>Cadastro de Animes</a><br>";
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