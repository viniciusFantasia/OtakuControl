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
    <div id="fundo-externo">
        <div id="fundo">
            <img src="imagens/otakucontrol2.jpg" alt="" />
        </div>
    </div>
    <div id="site">
        <img id="logo" src="imagens/logo2.png" alt="" /> 
        <?php
        session_start();
        if (isset($_SESSION["logado"]) && $_SESSION["logado"] == 'sim' && isset($_SESSION["IDOtaku"])) {
            $IDOtaku = $_SESSION["IDOtaku"];
        ?>
            <br>
            <h2>Cadastro de Anime</h2><br>
            <br>
            <form name="form1" action="inseriranime.php" method="POST">
                <label>Anime</label><br>
                <input type="text" name="anime" value="" placeholder="Digite o nome do anime" required><br><br><br>
                <label>Que Temporada você está?</label><br>
                <input type="number" name="temporada" value="" placeholder="Digite a temporada que você está" required><br><br>
                <!-- <label><strong>Episódios</strong></label><br> -->
                <label>Que Episódio você está?</label><br>
                <input type="radio" id="completo" name="episodio" value="completo" onclick="assistir()" required>
                <label for="completo">Completei, Assisti Tudo.</label><br>
                <input type="radio" id="episodio" name="episodio" value="episodio" onclick="assistir()" required>
                <label for="episodio">Parei em um episódio.</label><br>
                <input type="radio" id="inicio" name="episodio" value="inicio" onclick="assistir()" required>
                <label for="inicio">Ainda pretendo começar.</label><br>
                <br>
                <script>
                    function assistir() {
                        var $value = form1.episodio.value;
                        if ($value == 'episodio') {
                            //display
                            //mandar um imput number, para o otaku preencher que anime ele parou
                            //e mandar esse número para salvar no banco, na coluna episodio
                        }
                        if ($value == 'completo') {
                            //mandar a palavra 'completo' a ser salva no banco, na coluna episodio
                        }
                        if ($value == 'inicio') {
                            //mandar a palavra 'inicio' a ser salva no banco, na coluna episodio
                        }
                    }
                </script>
                <label>Observação</label><br><input type="text" name="observacao" value="" placeholder="Digite algo que te marcou neste anime"><br><br>
                <br>
                <label>Categoria</label><br>
                <select name="tipo" id="tipo">
                    <option value="Shounen">Shounen</option>
                    <option value="Shoujo">Shoujo</option>
                    <option value="Seinen">Seinen</option>
                    <option value="Outros">Outros</option>
                </select>
                <br><br>
                <input type="submit" value="Enviar">
                <input type="reset" value="Cancelar">
                <br>
                <br>
            </form>
            <h3>Minha Biblioteca de Animes</h3>
            <br>
            <br>
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
                $sql = "Select * from TBAnimes where IDOtaku=$IDOtaku order by Nome ";
                require_once "conexao.php";
                $result = $conn->query($sql);
                $dados = $result->fetchAll(PDO::FETCH_ASSOC);
                foreach ($dados as $linha) {
                    echo "<tr><td>" . $linha["Nome"] . "</td><td> " . $linha["Temporada"] . "</td>" .
                        "<td>" . $linha["Episodio"] . "</td><td>" . $linha["Observacao"] . "</td>" .
                        //perguntar se essa passagem de parametros está correta.
                        "<td><a href='editaranime.php?IDOtaku=" . $linha["IDOtaku"] . "&IDAnime=" . $linha["IDAnime"] . "'>Editar</a> " .
                        "<a href='excluiranime.php?IDOtaku=" . $linha["IDOtaku"] . "&IDAnime=" . $linha["IDAnime"] . "'>Excluir</a></td>" .
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
        <a href="home.php">Voltar</a><br>
    </div>
</body>

</html>