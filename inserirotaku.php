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
        <h3>Novo Otaku</h3>
        <?php
        if (
            isset($_POST['Nome']) && isset($_POST['Email'])
            && isset($_POST['Senha'])  && isset($_POST['Nickname'])  && isset($_POST['AnimeFavorito'])
        ) {
            $Nome = $_POST['Nome'];
            $Email = $_POST['Email'];
            $Senha = $_POST['Senha'];
            $Nickname = $_POST['Nickname'];
            $AnimeFavorito = $_POST['AnimeFavorito'];

            // echo "<p> Nome: $Nome</p>";
            // echo "<p> E-mail: $Email</p>";
            // echo "<p> Senha: $Senha</p>";
            // echo "<p> Nickname: $Nickname</p>";
            // echo "<p> Anime Favorito: $AnimeFavorito</p>";

            //montar a instrução SQL
            $sql = "insert into TBOtaku (Nome,Email,Senha,Nickname,AnimeFavorito) 
         values('$Nome','$Email','$Senha','$Nickname','$AnimeFavorito')";
            //echo $sql;
            require_once "conexao.php";
            $conn->exec($sql);
            echo "<p>Otaku Salvo com sucesso</p>";
        } else {
            echo "<p> ERRO AO RECEBER DADOS! <p>";
        }
        ?>
        <br>
        <a href="login.php">FAÇA LOGIN</a><br>
    </div>
</body>

</html>