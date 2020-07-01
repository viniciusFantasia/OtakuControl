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
    <h3>Dados do Anime Atualizados.</h3>
    <?php
    if (isset($_POST['IDAnime']) && isset($_POST['IDOtaku']) 
     && isset($_POST['Nome'])  && isset($_POST['Temporada'])
     && isset($_POST['Episodio']) && isset($_POST['Tipo'])
     && isset($_POST['Observacao'])) {
        $IDAnime = $_POST['IDAnime'];
        $IDOtaku = $_POST['IDOtaku'];
        $Nome = $_POST['Nome'];
        $Temporada = $_POST['Temporada'];
        $Episodio = $_POST['Episodio'];
        $Tipo = $_POST['Tipo'];
        $Observacao = $_POST['Observacao'];

         //montar a instrução SQL
         $sql="update TBAnimes set 
         Nome = '$Nome',
         Temporada = '$Temporada',
         Episodio = '$Episodio',
         Tipo = '$Tipo',
         Observacao = '$Observacao'
         where IDAnime='$IDAnime' AND IDOtaku='$IDOtaku'";
         //echo $sql;
         require_once "conexao.php";
         $conn->exec($sql);
         echo "<p>Salvo com sucesso</p>";
    } else {
        echo "<p> Erro aos receber os dados!!! <p>";
    }
    ?>
    <br>
    <a href="cadanime.php">Voltar</a><br>
</body>

</html>