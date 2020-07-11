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
    <h3>Novo Anime</h3>
    <?php
    if (isset($_POST['Nome']) && isset($_POST['Temporada']) 
     && isset($_POST['Episodio'])  && isset($_POST['Tipo'])
     && isset($_POST['Observacao']) && isset($_POST['IDOtaku'])) {
        $Nome = $_POST['Nome'];
        $Temporada = $_POST['Temporada'];
        $Episodio = $_POST['Episodio'];
        $Tipo = $_POST['Tipo'];
        $Observacao = $_POST['Observacao'];
        $IDOtaku = $_POST['IDOtaku'];

        // echo "<p> Anime: $Nome</p>";
        // echo "<p> Temporada: $Temporada</p>";
        // echo "<p> Episodios: $Episodio</p>";
        // echo "<p> Tipo: $Tipo</p>";
        // echo "<p> Observação: $Observacao</p>";
        // echo "<p> IDOtaku: $IDOtaku</p>";


         //montar a instrução SQL
         $sql="insert into TBAnimes (Nome, Episodio, IDOtaku, Tipo, Observacao, Temporada) 
         values('$Nome','$Episodio','$IDOtaku','$Tipo', '$Observacao', '$Temporada')";
        //  echo $sql;
         require_once "conexao.php";
         $conn->exec($sql);
         echo "<p>Anime Inserido com sucesso!!</p>";
    } else {
        echo "<p> Erro aos receber os dados para inserir o anime!!! <p>";
    }
    ?>
    <br>
    <a href="cadanime.php">Voltar</a><br>
    <a href="home.php">Home</a><br>
</body>

</html>