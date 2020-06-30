<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minha Biblioteca</title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="textocentralizado">
    <h1>Minha Biblioteca Pessoal</h1>
    <?php
    session_start();
    if (isset($_SESSION["logado"]) && $_SESSION["logado"] == 'sim') {
    ?>
        <h3>Cadastro</h3>
        <form name="form1" action="inseriranime.php" method="POST">
            <label>Anime</label><br><input type="varchar(50)" name="anime" value="" placeholder="Digite o nome" required><br><br>
            <label>Temporada</label><br><input type="int" name="temporada" value="" placeholder="Digite a temporada que você está" required><br><br>
            <label>Episodio</label><br><input type="varchar(10)" name="episodio" value="" placeholder="Digite o espisodio que você está" required><br><br>
            <label>Observacao</label><br><input type="int" name="temporada" value="" placeholder="Digite algo para lembrar " ><br><br>
            <br><br>
            <label>Categoria</label><br>
            <select name="tipo">
                <option value="Shounen">Shounen</option>
                <option value="Shoujo">Shoujo</option>
                <option value="Seinen">Seinen</option>
                <option value="Outros">Outros</option> 
            </select>
            <br><br>
            <input type="submit" value="Enviar">
            <input type="reset" value="Cancelar">
        </form>
        <table>
            <tr>
                <th>
                    Anime
                </th>
                <th>
                    Temporada
                </th>
                <th>
                    Episódio
                </th>
                <th>
                    Observação
                </th>
                <th>
                    Ações
                </th>
            </tr>
            <?php
            $sql = "Select * from tbanimes order by Nome where idotaku=$idotaku";
            require_once "conexao.php";
            $result = $conn->query($sql);
            $dados = $result->fetchAll(PDO::FETCH_ASSOC);
            foreach ($dados as $linha) {
                echo "<tr><td>" . $linha["Nome"] . "</td><td> " . $linha["Temporada"] . "</td>" .
                    "<td>" . $linha["Episodio"] . "</td><td>" . $linha["Observacao"] . "</td>" .
                    "<td><a href='editarotaku.php?id=" . $linha["id"] . "'>Editar</a> " .
                    "<a href='excluirotaku.php?id=" . $linha["id"] . "'>Excluir</a></td>" .
                    "</tr>";
            }
            ?>
        </table>
    <?php
    } else {
        echo "<p>Erro ao receber dados</p>";
        echo "<a href='cadotaku.php'>Cadastre-se</a>";
        echo "  ou  ";
        echo "<a href='login.php'>Faça o login</a>";
    }
    ?>
    <a href="index.php">Voltar</a><br>
</body>

</html>