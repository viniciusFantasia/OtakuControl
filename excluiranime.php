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
    if (isset($_GET['IDAnime']) && isset($_GET['IDOtaku'])) {
        $IDAnime = $_GET['IDAnime'];
        $IDOtaku = $_GET['IDOtaku'];

         //montar a instrução SQL
         $sql="delete from TBAnimes where IDAnime=$IDAnime AND IDOtaku=$IDOtaku";
         //echo $sql;
         require_once "conexao.php";
         $conn->exec($sql);
         echo "<p>Anime excluido com sucesso!</p>";
    } else {
        echo "<p> Erro aos receber os dados!!! <p>";
    }
    ?>
    <br>
    <a href="cadanime.php">Voltar</a><br>
    <a href="home.php">Home</a><br>
</body>

</html>