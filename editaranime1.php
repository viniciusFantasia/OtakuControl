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
            <img src="imagens/otakucontrol.jpg" alt="" />
        </div>
    </div>
    <div id="site">
        <img id="logo" src="imagens/logo2.png" alt="" />
        <h3>Editar Anime</h3>
        <?php
        session_start();
        if (isset($_SESSION["logado"]) && $_SESSION["logado"] == 'sim') {
            if (isset($_GET['IDAnime']) && isset($_GET['IDOtaku'])) {
                $IDOtaku = $_GET['IDOtaku'];
                $IDAnime = $_GET['IDAnime'];
                $sql = "Select * from TBAnimes where IDOtaku=$IDOtaku AND IDAnime=$IDAnime";
                require_once "conexao.php";
                $result = $conn->query($sql);
                $dados = $result->fetchAll(PDO::FETCH_ASSOC);
                foreach ($dados as $linha) { ?>
                    <form name="form1" action="editaranime2.php" method="POST" class="textocentralizado">
                        <br>
                        <input type="hidden" name="IDAnime" value="<?php echo $linha['IDAnime']; ?>">
                        <input type="hidden" name="IDOtaku" value="<?php echo $linha['IDOtaku']; ?>">
                        <label>Anime</label>
                        <input type="text" name="Nome" value="<?php echo $linha['Nome']; ?>" placeholder="Digite o Nome do Anime" required><br><br>
                        <label>Que Temporada você está?</label>
                        <input type="text" name="Temporada" value="<?php echo $linha['Temporada']; ?>" placeholder="Digite a Temporada"><br><br>
                        <label>Que episódio você está?</label><br>
                        <?php
                        if ($linha['Episodio'] === 'Completo') { ?>
                            <input type="radio" id="Completo" name="Episodio" value="Completo" required checked="checked">
                            <label for="Completo">Completei, Assisti Tudo.</label><br>
                            <input type="radio" id="Incompleto" name="Episodio" value="Incompleto" required>
                            <label for="Incompleto">Parei em um episódio.</label><br>
                            <input type="radio" id="Inicio" name="Episodio" value="Inicio" required>
                            <label for="Inicio">Ainda pretendo começar.</label><br>
                        <?php }
                        if ($linha['Episodio'] === 'Incompleto') { ?>
                            <input type="radio" id="Completo" name="Episodio" value="Completo" required>
                            <label for="Completo">Completei, Assisti Tudo.</label><br>
                            <input type="radio" id="Incompleto" name="Episodio" value="Incompleto" required checked="checked">
                            <label for="Incompleto">Parei em um episódio.</label><br>
                            <input type="radio" id="Inicio" name="Episodio" value="Inicio" required>
                            <label for="Inicio">Ainda pretendo começar.</label><br>
                        <?php }
                        if ($linha['Episodio'] === 'Inicio') { ?>
                            <input type="radio" id="Completo" name="Episodio" value="Completo" required>
                            <label for="Completo">Completei, Assisti Tudo.</label><br>
                            <input type="radio" id="Incompleto" name="Episodio" value="Incompleto" required>
                            <label for="Incompleto">Parei em um episódio.</label><br>
                            <input type="radio" id="Inicio" name="Episodio" value="Inicio" required checked="checked">
                            <label for="Inicio">Ainda pretendo começar.</label><br>
                        <?php
                        }
                        ?>
                        <br>
                        <label>Observacao</label><br><input type="text" name="Observacao" value="<?php echo $linha['Observacao']; ?>" placeholder="Digite algo que te marcou neste anime"><br><br>
                        <br>
                        <label>Categoria</label><br>
                        <?php if ($linha['Tipo'] === 'Shounen') { ?>
                            <select name="Tipo" id="tipo">
                                <option value="Shounen" selected>Shounen</option>
                                <option value="Shoujo">Shoujo</option>
                                <option value="Seinen">Seinen</option>
                                <option value="Outros">Outros</option>
                            </select><br>
                        <?php }
                        if ($linha['Tipo'] === 'Shoujo') { ?>
                            <select name="Tipo" id="tipo">
                                <option value="Shounen">Shounen</option>
                                <option value="Shoujo" selected>Shoujo</option>
                                <option value="Seinen">Seinen</option>
                                <option value="Outros">Outros</option>
                            </select><br>
                        <?php }
                        if ($linha['Tipo'] === 'Seinen') { ?>
                            <select name="Tipo" id="tipo">
                                <option value="Shounen">Shounen</option>
                                <option value="Shoujo">Shoujo</option>
                                <option value="Seinen" selected>Seinen</option>
                                <option value="Outros">Outros</option>
                            </select><br>
                        <?php }
                        if ($linha['Tipo'] === 'Outros') { ?>
                            <select name="Tipo" id="tipo">
                                <option value="Shounen">Shounen</option>
                                <option value="Shoujo">Shoujo</option>
                                <option value="Seinen">Seinen</option>
                                <option value="Outros" selected>Outros</option>
                            </select><br>
                        <?php } ?>
                        <br>
                        <input type="submit" value="SALVAR">
                        <input type="reset" value="CANCELAR">
                    </form>
        <?php
                }
            }
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