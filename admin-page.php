<?php
include_once 'incluides/conexao.php';
$query = "SELECT idempresa, nomeempresa, logo, favicon, banner_cardapio, endereco, numero, complemento, bairro, cidade, estado, telefone, whatsapp FROM empresa Where situacao=1";
$result_query = $con->prepare($query);
$result_query->execute();
// $qtd_empresa = $result_query->rowCount($query);
// var_dump($qtd_empresa);
while ($row_query = $result_query->fetch(PDO::FETCH_ASSOC)) {
    extract($row_query);
}
?>
<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <!--<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">-->
    <meta name="author" content="Gustavo Santos">
    <meta name="generator" content="JG v1.0">
    <!--CSS do Bootstrap-->
    <link rel="stylesheet" media="screen" href="css/bootstrap.min.css">
    <!--Meu CSS-->
    <link rel="stylesheet" href="css/style.css">
    <!--Favicon-->
    <link rel="shortcut icon" href="img/<?php echo $favicon ?>" type="image/x-icon">
    <link rel="icon" href="img/<?php echo $favicon ?>" type="image/x-icon">
    <title><?php echo $nomeempresa ?> - Administração</title>

</head>
<script src="js/sweetalert.min.js" type="text/javascript"></script>
<script>
    //apt consulta cnpj?
</script>
<body>

    <!--Menu-->
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #353130; color: #ffffff;">
        <a class="navbar-brand" href="#" style="margin-left: 1%;"><img src="img/<?php echo $logo ?>" alt="<?php echo $nomeempresa ?>"></a>
        <span id="user-login"></span>
        <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Alterna navegação">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse ml-auto" id="navbarNav" style="margin-left: 1%;">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item ml-auto">
                    <a class="nav-link" href="#carousel" style="color: white;">CAROUSEL</a>
                </li>
                <li class="nav-item ml-auto">
                    <a class="nav-link" href="#banner" style="color: white;">BANNER</a>
                </li>
                <li class="nav-item ml-auto">
                    <a class="nav-link" href="#cardapio" style="color: white;">CARDÁPIO</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container-fluid" id="carousel">
        <div class="col-md-12 reverse"><br>
            <span class="titulo" style="text-align: center;">
                <h5>
                    <p>CAROUSEL</p>
                </h5>
            </span>
            <section class="container-flex">
                <div class="row">
                    <?php
                    include_once 'incluides/conexao.php';
                    $query_carousel = "SELECT slides, imagem, situacao FROM carousel";
                    $resultado_carousel = $con->prepare($query_carousel);
                    $resultado_carousel->execute();
                    // $qtd_carousel = $resultado_carousel->rowCount();
                    // var_dump($qtd_carousel);
                    while ($row_casousel = $resultado_carousel->fetch(PDO::FETCH_ASSOC)) {
                        extract($row_casousel);
                        echo "<div class='col'>";
                        echo "<a href='img/carousel/$slides/$imagem' target='_blank' class='col-md-4 col-lg-3 col-12 carousel-card-wrapper'> 
                                <img class='carousel-card' src='img/carousel/$slides/$imagem' alt='image'>
                                </a>";
                        echo "<a href='routers/cadastrar-carousel.php?id=$slides&imagem=$imagem&excluir=sim' id='lixeira' class='bi bi-trash3' title='Excluir ($imagem)'></a>";
                        echo "<a href='routers/cadastrar-carousel.php?id=$slides&imagem=$imagem&ativo=sim' id='ativo' class='bi bi-check-square' title='Ativo ($imagem)'></a>";
                        echo "<a href='routers/cadastrar-carousel.php?id=$slides&imagem=$imagem&desativar=sim' id='desativar' class='bi bi-dash-square' title='Desativar ($imagem)'></a>";
                        echo "</div>";
                    }
                    ?>
                </div>
            </section>
            <br><br>
            <div class="col-md-12 titulo image-upload" style="text-align: left;"><br><br>
                <label for="imagem">
                    <span class="form-control bi bi-file-earmark-arrow-up" id="img-upload"> Adicionar</span>
                </label><br>
                <input class="form-control" type="file" name="arquivo" id="imagem" accept="image/*" />
            </div>
        </div>
        <br>
        <div class='row' style='background-color: #b3a9a1; height: 15px;'></div>
    </div>

    <!--Rodapé-->
    <footer>
        <div class="container-fluid">
            <div class="row">
                <div id="footer" class="col" style="background-color: #353130;">
                    <div id="textofooter">
                        Desenvolvido por - <a href="https://github.com/gustavosantos88" style="text-decoration:none;" target="_blank">
                            <img style="width: 16px;" src="img/github-icone.png"> Gustavo Santos</a>
                    </div>
                </div>
            </div>
        </div>

        <!--Scripts-->
        <script src="js/jquery-3.3.1.slim.js"></script>
        <script src="js/pooper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/main.js"></script>
    </footer>
</body>

</html>