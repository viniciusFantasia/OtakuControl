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
    if (isset($_SESSION["logado"]) && $_SESSION["logado"] == 'sim') {
        if (isset($_GET['idotaku'])) {
            $id = $_GET['idotaku'];
            $sql = "Select * from tbotaku where idotaku=$id";
            require_once "conexao.php";
            $result = $conn->query($sql);
            $dados = $result->fetchAll(PDO::FETCH_ASSOC);
            foreach ($dados as $linha) { ?>
                <form name="form1" action="editarotaku2.php" method="POST" class="textocentralizado">
                    <label>Id: </label><?php echo $linha['idotaku']; ?> <br>
                    <input type="hidden" name="id" value="<?php echo $linha['idotaku']; ?>">
                    <label>Nome</label>
                    <input type="text" name="nome" value="<?php echo $linha['nome']; ?>" placeholder="Digite seu Nome" required><br><br>
                    <label>Nickname</label>
                    <input type="text" name="nick" value="<?php echo $linha['nickname']; ?>" placeholder="Digite seu Nickname(Apelido)" required><br><br>
                    <label>E-mail</label>
                    <input type="email" name="email" value="<?php echo $linha['email']; ?>" placeholder="Digite seu E-mail" required><br><br>
                    <label>Senha</label>
                    <input type="password" name="senha" value="<?php echo $linha['senha']; ?>" placeholder="Digite sua Senha" required><br><br>
                    <label>Qual seu Anime Favorito?</label>
                    <input type="text" name="animefavorito" value="<?php echo $linha['animefavorito']; ?>" placeholder="Digite seu Anime Favorito" required><br><br>
                    <input type="submit" value="Salvar">
                    <input type="reset" value="Cancelar">
                </form>
    <?php
            }
        }
    } else {
        echo "<p>Erro ao receber dados</p>";
        echo "<a href='login.php'>Faça o login</a>";
    }
    ?>
    <a href="index.php">Voltar</a><br>
</body>

</html>