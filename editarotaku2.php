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
    <h3>Dados Pessoais Atualizados</h3>
    <?php
    if (isset($_POST['Nome']) && isset($_POST['Email']) 
     && isset($_POST['Senha'])  && isset($_POST['AnimeFavorito'])  && isset($_POST['Nickname'])) {
        $Nome = $_POST['Nome'];
        $Email = $_POST['Email'];
        $Senha = $_POST['Senha'];
        $AnimeFavorito = $_POST['AnimeFavorito'];
        $Nickname = $_POST['Nickname'];

        // echo "<p> Nome: $Nome</p>";
        // echo "<p> E-mail: $Email</p>";
        // echo "<p> Senha: $Senha</p>";
        // echo "<p> Anime Favorito: $AnimeFavorito</p>";
        // echo "<p> Nickname: $Nickname</p>";

         //montar a instrução SQL
         $sql="update tbotaku set 
         Nome = '$Nome',
         Email = '$Email',
         Senha = '$Senha',
         AnimeFavorito = '$AnimeFavorito',
         Nickname = '$Nickname'
         where IDOtaku='$IDOtaku'";
         //echo $sql;
         require_once "conexao.php";
         $conn->exec($sql);
         echo "<p>Salvo com sucesso</p>";
    } else {
        echo "<p> Erro aos receber os dados!!! <p>";
    }
    ?>
    <br>
    <a href="cadotaku.php">Voltar</a><br>
</body>

</html>