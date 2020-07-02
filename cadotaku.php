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
    <br>
    <h2>Sua biblioteca de animes favoritos!</h2>
    <br>
    <h3>Cadastro</h3>
    <form name="form1" action="inserirotaku.php" method="POST">
        <label>Nome</label><br><input type="text" name="Nome" value="" placeholder="Digite o Nome" required><br><br>
        <label>Nickname</label><br><input type="text" name="Nickname" value="" placeholder="Digite seu Nickname (Apelido)" required><br><br>
        <label>E-mail</label><br><input type="email" name="Email" value="" placeholder="Digite o E-mail" required><br><br>
        <label>Senha</label><br><input type="password" name="Senha" value="" placeholder="Digite a Senha" required><br><br>
        <label>Qual seu Anime Favorito?</label><br><input type="text" name="AnimeFavorito" value="" placeholder="Digite Anime Favorito"><br><br>
        <input type="submit" value="Enviar">
        <input type="reset" value="Cancelar">
    </form><br>
    <a href="index.php">Voltar</a><br>
    <?php
    session_start();
    if (isset($_SESSION["logado"]) && $_SESSION["logado"] == 'sim') {
    ?>
        <h2>Pessoas Cadastradas</h2>
        <table>
            <tr>
                <th>
                    ID
                </th>
                <th>
                    Nome
                </th>
                <th>
                    Nickname
                </th>
                <th>
                    Email
                </th>
                <th>
                    Anime Favorito
                </th>
                <th>
                    Ações
                </th>
            </tr>
            <?php
            $sql = "Select * from TBOtaku order by Nome";
            require_once "conexao.php";
            $result = $conn->query($sql);
            $dados = $result->fetchAll(PDO::FETCH_ASSOC);
            foreach ($dados as $linha) {
                echo "<tr><td>" . $linha["IDOtaku"] . "</td><td>" . $linha["Nome"] . "</td><td>" . $linha["Nickname"] . "</td><td> " . $linha["Email"] . "</td>" .
                    "<td>" . $linha["AnimeFavorito"] . "</td>" .
                    "<td><a href='editarotaku1.php?id=" . $linha["IDOtaku"] . "'>Editar</a> " .
                    "<a href='excluirotaku.php?id=" . $linha["IDOtaku"] . "'>Excluir</a></td>" .
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
    </br>
    <a href="home.php">Voltar</a><br>
</body>

</html>