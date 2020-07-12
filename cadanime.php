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
                <input type="hidden" name="IDOtaku" value="<?php echo $IDOtaku; ?>">
                <label>Anime</label><br>
                <input type="text" name="Nome" value="" placeholder="Digite o nome do anime" required><br><br><br>
                <label>Que Temporada você está?</label><br>
                <input type="number" name="Temporada" value="" placeholder="Digite a temporada que você está" required><br><br>
                <label>Que Episódio você está?</label><br>
                <input type="radio" id="completo" name="Episodio" value="Completo" required>
                <label class="normal" for="completo">Completei, Assisti Tudo.</label><br>
                <input type="radio" id="episodio" name="Episodio" value="Incompleto" required>
                <label class="normal" for="episodio">Parei em um episódio.</label><br>
                <input type="radio" id="inicio" name="Episodio" value="Inicio" required>
                <label class="normal" for="inicio">Ainda pretendo começar.</label><br>
                <br>
                <label>Observação</label><br><input type="text" name="Observacao" value="" placeholder="Digite algo que te marcou neste anime"><br><br>
                <br>
                <label>Categoria</label><br>
                <select name="Tipo" id="tipo">
                    <option value="Shounen">Shounen</option>
                    <option value="Shoujo">Shoujo</option>
                    <option value="Seinen">Seinen</option>
                    <option value="Outros">Outros</option>
                </select>
                <br><br>
                <input type="submit" value="CADASTRAR">
                <input type="reset" value="CANCELAR">
                <br>
                <br>
            </form>
            <br>
            <h3>Seus Animes</h3>
            <table>
                <tr>
                    <th>
                        ID
                    </th>
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
                        Categoria
                    </th>
                    <th>
                        Observação
                    </th>
                    <th colspan="2">
                        Ações
                    </th>
                </tr>
                <?php
                $sql = "Select * from TBAnimes where IDOtaku=$IDOtaku order by Nome";
                require_once "conexao.php";
                $result = $conn->query($sql);
                $dados = $result->fetchAll(PDO::FETCH_ASSOC);
                foreach ($dados as $linha) {
                    echo "<tr><td>" . $linha["IDAnime"] . "</td><td>" . $linha["Nome"] . "</td><td> " . $linha["Temporada"] . "</td>" .
                        "<td>" . $linha["Episodio"] . "</td><td>" . $linha["Tipo"] . "</td>" .
                        "<td>" . $linha["Observacao"] . "</td>" .
                        "<td><a class='btnmenor'; href='editaranime1.php?IDOtaku=" . $linha["IDOtaku"] . "&IDAnime=" . $linha["IDAnime"] . "'>EDITAR</a>" .
                        "<a class='btnmenor'; href='excluiranime.php?IDOtaku=" . $linha["IDOtaku"] . "&IDAnime=" . $linha["IDAnime"] . "'>EXCLUIR</a></td>" .
                        "</tr>";
                }
                ?>
            </table>
        <?php
        } else {
            echo "<p>ERRO AO RECEBER OS DADOS</p>";
            echo "<a href='cadotaku.php'>CADASTRE-SE</a>";
            echo "  OU  ";
            echo "<a href='login.php'>FAÇA O LOGIN</a>";
        }
        ?>
        <br>
        <a href="home.php">HOME</a><br>
    </div>
</body>

</html>