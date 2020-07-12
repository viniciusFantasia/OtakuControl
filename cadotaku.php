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
            <img src="imagens/planodefundo.png" alt="" />
        </div>
    </div>
    <?php
    session_start();
    if (isset($_SESSION["logado"]) && $_SESSION["logado"] == 'sim' && isset($_SESSION["IDOtaku"])) {
        //se tiver logado e com idotaku aparece as informações do perfil e um link "editar perfil" 
        //que leva para editarotaku1, e pode ver as pessoas que estiverem cadastradas na plataforma
        //se não estiver logado aparecer dois links - faça seu cadastro ou faça seu login
        $IDOtaku = $_SESSION["IDOtaku"];
        $sql = "Select * from TBOtaku where IDOtaku=IDOtaku order by Nome";
        require_once "conexao.php";
        $result = $conn->query($sql);
        $dados = $result->fetchAll(PDO::FETCH_ASSOC);
    ?>
        <div id="site">
            <img id="logo" src="imagens/logo2.png" alt="" />

            <h3>Perfil</h3><br>
            <?php
            foreach ($dados as $linha) { ?>
                <form name="form1" class="textocentralizado">
                    <!-- <label>IDOtaku: </label><?php echo $linha['IDOtaku']; ?> <br> -->
                    <input type="hidden" name="IDOtaku" value="<?php echo $linha['IDOtaku']; ?>">
                    <label>Nome</label><br>
                    <input type="text" name="Nome" value="<?php echo $linha['Nome']; ?>" placeholder="Digite seu Nome" required><br><br>
                    <label>Nickname</label><br>
                    <input type="text" name="Nickname" value="<?php echo $linha['Nickname']; ?>" placeholder="Digite seu Nickname(Apelido)" required><br><br>
                    <label>E-mail</label><br>
                    <input type="email" name="Email" value="<?php echo $linha['Email']; ?>" placeholder="Digite seu E-mail" required><br><br>
                    <label>Senha</label><br>
                    <input type="password" name="Senha" value="<?php echo $linha['Senha']; ?>" placeholder="Digite sua Senha" required><br><br>
                    <label>Qual seu Anime Favorito?</label><br>
                    <input type="text" name="AnimeFavorito" value="<?php echo $linha['AnimeFavorito']; ?>" placeholder="Digite seu Anime Favorito" required><br><br>
                    <?php echo "<a href='editarotaku1.php?IDOtaku=" . $linha["IDOtaku"] ."'>Editar Perfil</a><br>";?><br>
                    <?php echo"<a href='excluirotaku.php?IDOtaku=" . $linha["IDOtaku"] . "'>Deletar Perfil</a>";?>
                </form><br>
                <h2>Otakus no Control</h2>
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
                    </tr>
                    <?php
                    $sql = "Select * from TBOtaku order by Nome";
                    require_once "conexao.php";
                    $result = $conn->query($sql);
                    $dados = $result->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($dados as $linha) {
                        echo "<tr><td>" . $linha["IDOtaku"] . "</td><td>" . $linha["Nome"] . "</td><td>" . $linha["Nickname"] . "</td><td> " . $linha["Email"] . "</td>" .
                            "<td>" . $linha["AnimeFavorito"] . "</td>" .
                            "</tr>";
                    }
                    ?>
                </table>
            <?php
            }
        } else { ?>
            <div id="site">
                <img id="logo" src="imagens/logo2.png" alt="" />

                <h3>Cadastro de Otaku</h3><br>
                <form name="form1" action="inserirotaku.php" method="POST">
                    <label>Nome</label><br><input type="text" name="Nome" value="" placeholder="Digite o Nome" required><br><br>
                    <label>Nickname</label><br><input type="text" name="Nickname" value="" placeholder="Digite seu Nickname (Apelido)" required><br><br>
                    <label>E-mail</label><br><input type="email" name="Email" value="" placeholder="Digite o E-mail" required><br><br>
                    <label>Senha</label><br><input type="password" name="Senha" value="" placeholder="Digite a Senha" required><br><br>
                    <label>Qual seu Anime Favorito?</label><br><input type="text" name="AnimeFavorito" value="" placeholder="Digite Anime Favorito"><br><br>
                    <input type="submit" value="Cadastrar">
                    <input type="reset" value="Cancelar">
                </form><br>
            <?php
            echo "  ou  ";
            echo "<a href='login.php'>Faça o login</a>";
        }
            ?>
            </br>
            <a href="home.php">Home</a><br>
            </div>
</body>

</html>