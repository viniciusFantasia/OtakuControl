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
    <div id="fundo-externo2">
        <div id="fundo2">
            <img src="imagens/ino_shippuden.jpeg" alt="" />
        </div>
    </div>
    <div id="site">
        <img id="logo" src="imagens/logo2.png" alt="" />
        <?php
        session_start();
        if (isset($_SESSION["logado"]) && $_SESSION["logado"] == 'sim') {
            if (isset($_GET['IDOtaku'])) {
                $IDOtaku = $_GET['IDOtaku'];
                $sql = "Select * from tbotaku where IDOtaku=$IDOtaku";
                require_once "conexao.php";
                $result = $conn->query($sql);
                $dados = $result->fetchAll(PDO::FETCH_ASSOC);
                foreach ($dados as $linha) { ?>
                    <form name="form1" action="editarotaku2.php" method="POST" class="textocentralizado">
                        <!-- <label>Id: </label><?php echo $linha['IDOtaku']; ?> <br> -->
                        <input type="hidden" name="IDOtaku" value="<?php echo $linha['IDOtaku']; ?>">
                        <label>Nome</label>
                        <input type="text" name="Nome" value="<?php echo $linha['Nome']; ?>" placeholder="Digite seu Nome" required><br><br>
                        <label>Nickname</label>
                        <input type="text" name="Nickname" value="<?php echo $linha['Nickname']; ?>" placeholder="Digite seu Nickname(Apelido)" required><br><br>
                        <label>E-mail</label>
                        <input type="email" name="Email" value="<?php echo $linha['Email']; ?>" placeholder="Digite seu E-mail" required><br><br>
                        <label>Senha</label>
                        <input type="password" name="Senha" value="<?php echo $linha['Senha']; ?>" placeholder="Digite sua Senha" required><br><br>
                        <label>Qual seu Anime Favorito?</label>
                        <input type="text" name="AnimeFavorito" value="<?php echo $linha['AnimeFavorito']; ?>" placeholder="Digite seu Anime Favorito" required><br><br>
                        <input type="submit" value="SALVAR">
                        <input type="reset" value="CANCELAR">
                    </form>
        <?php
                }
            }
        } else {
            echo "<p>ERRO AO RECEBER OS DADOS!</p>";
            echo "<a href='login.php'>FAÇA LOGIN</a>";
        }
        ?>
        <br>
        <a href="cadotaku.php">VOLTAR</a><br><br>
        <a href="home.php">HOME</a><br>
    </div>
</body>

</html>