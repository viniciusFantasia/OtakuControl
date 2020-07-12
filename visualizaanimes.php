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
            <img src="imagens/Ino_Parte_I.png" alt="" />
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
            <h3>Animes no Control</h3>
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
                    <th>
                        Otaku
                    </th>
                </tr>
                <?php
                $sql = "SELECT a.IDAnime IDAnime,
                                a.Nome Nome,
                                a.Temporada Temporada,
                                a.Episodio Episodio,
                                a.Observacao Observacao,
                                a.Tipo Tipo,
                                o.Nome Otaku
                        FROM TBAnimes a
                        JOIN TBOtaku o
                        ON o.IDOtaku=a.IDOtaku
                        ORDER BY a.Nome";
                require_once "conexao.php";
                $result = $conn->query($sql);
                $dados = $result->fetchAll(PDO::FETCH_ASSOC);
                foreach ($dados as $linha) {
                    echo "<tr><td>" . $linha["IDAnime"] . "</td><td>" . $linha["Nome"] . "</td><td> " . $linha["Temporada"] . "</td>" .
                        "<td>" . $linha["Episodio"] . "</td><td>" . $linha["Tipo"] . "</td>" .
                        "<td>" . $linha["Observacao"] . "</td>" .
                        "<td>". $linha["Otaku"] . "</td>" .
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