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
    <h3>Editar Anime</h3>
    <?php
    session_start();
    if (isset($_SESSION["logado"]) && $_SESSION["logado"] == 'sim') {
        if (isset($_GET['IDAnime']) && isset($_GET['IDOtaku'])) {
            $IDOtaku = $_GET['IDOtaku'];
            $IDAnime = $_GET['IDAnime'];
            $sql = "Select * from TBAnime where IDOtaku=$IDOtaku AND IDAnime=$IDAnime";
            require_once "conexao.php";
            $result = $conn->query($sql);
            $dados = $result->fetchAll(PDO::FETCH_ASSOC);
            foreach ($dados as $linha) { ?>
                <form name="form1" action="editaranime2.php" method="POST" class="textocentralizado">
                    <label>IDAnime: </label><?php echo $linha['IDAnime']; ?> <br>
                    <input type="hidden" name="IDAnime" value="<?php echo $linha['IDAnime']; ?>">
                    <label>Otaku</label>
                    <input type="text" name="IDOtaku" value="<?php echo $linha['IDOtaku']; ?>"><br><br>
                    <label>Anime</label>
                    <input type="text" name="Nome" value="<?php echo $linha['Nome']; ?>" placeholder="Digite o Nome do Anime" required><br><br>
                    <label>Que Temporada você está?</label>
                    <input type="text" name="Temporada" value="<?php echo $linha['Temporada']; ?>" placeholder="Digite a Temporada"><br><br>
                    <label>Que episódio você está?</label><br>
                    <input type="radio" id="completo" name="episodio" value="completo" onclick="assistir()" required><br>
                    <label for="completo">Completei, Assisti Tudo.</label><br>
                    <input type="radio" id="episodio" name="episodio" value="episodio" onclick="assistir()" required><br>
                    <label for="episodio">Parei em um episódio.</label><br>
                    <input type="radio" id="inicio" name="episodio" value="inicio" onclick="assistir()" required><br>
                    <label for="inicio">Ainda pretendo começar.</label><br>
                    <br>
                    <script>
                        function assistir() {
                            var $value;
                            if ($value == 'episodio') {
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
                    <label>Observacao</label><br><input type="text" name="observacao" value="<?php echo $linha['Observacao']; ?>" placeholder="Digite algo que te marcou neste anime"><br><br>
                    <br><br>
                    <label>Categoria</label><br>
                    <select name="tipo" id="tipo">
                        <option value="Shounen">Shounen</option>
                        <option value="Shoujo">Shoujo</option>
                        <option value="Seinen">Seinen</option>
                        <option value="Outros">Outros</option>
                    </select>
                    <input type="submit" value="Salvar">
                    <input type="reset" value="Cancelar">
                </form>
    <?php
            }
        }
    } else {
        echo "<p>Erro ao receber dados</p>";
        echo "<a href='cadotaku.php'>Cadastre-se</a>";
        echo "  ou  ";
        echo "<a href='login.php'>Faça o login</a>";
    }
    ?>
    <a href="home.php">Voltar</a><br>
</body>

</html>