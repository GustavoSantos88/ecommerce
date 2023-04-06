<?php
// phpinfo();
// exit;
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
    <meta name="generator" content="GS v1.0">
    <!--Favicon-->
    <link rel="shortcut icon" href="img/<?php echo $favicon ?>" type="image/x-icon">
    <link rel="icon" href="img/<?php echo $favicon ?>" type="image/x-icon">
    <!--CSS do Bootstrap-->
    <link rel="stylesheet" media="screen" href="css/bootstrap.min.css">
    <!--Meu CSS-->
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <link rel="stylesheet" type="text/css" href="css/animate.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="js/sweetalert2.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script> -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
    <title><?php echo $nomeempresa ?> - Delivery</title>

</head>

<style>
    /* icone */
    @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css");

    body {
        font-family: "Open Sans", sans-serif;
    }

    h2 {
        color: #000;
        font-size: 26px;
        font-weight: 300;
        text-align: center;
        text-transform: uppercase;
        position: relative;
        margin: 30px 0 80px;
    }

    h2 b {
        color: #ffc000;
    }

    h2::after {
        content: "";
        width: 100px;
        position: absolute;
        margin: 0 auto;
        height: 4px;
        background: rgba(0, 0, 0, 0.2);
        left: 0;
        right: 0;
        bottom: -20px;
    }

    .carousel {
        margin: 50px auto;
        padding: 0 70px;
    }

    .carousel .carousel-item {
        min-height: 330px;
        text-align: center;
        overflow: hidden;
    }

    .carousel .carousel-item .img-box {
        height: 160px;
        width: 100%;
        position: relative;
    }

    .carousel .carousel-item img {
        max-width: 100%;
        max-height: 100%;
        display: inline-block;
        position: absolute;
        bottom: 0;
        margin: 0 auto;
        left: 0;
        right: 0;
    }

    .carousel .carousel-item h4 {
        font-size: 18px;
        margin: 10px 0;
    }

    .carousel .carousel-item .btn {
        color: #333;
        border-radius: 0;
        font-size: 11px;
        text-transform: uppercase;
        font-weight: bold;
        background: none;
        border: 1px solid #ccc;
        padding: 5px 10px;
        margin-top: 5px;
        line-height: 16px;
    }

    .carousel .carousel-item .btn:hover,
    .carousel .carousel-item .btn:focus {
        color: #fff;
        background: #000;
        border-color: #000;
        box-shadow: none;
    }

    .carousel .carousel-item .btn i {
        font-size: 14px;
        font-weight: bold;
        margin-left: 5px;
    }

    .carousel .thumb-wrapper {
        text-align: center;
    }

    .carousel .thumb-content {
        padding: 15px;
    }

    .carousel-control-prev,
    .carousel-control-next {
        height: 100px;
        width: 40px;
        background: none;
        margin: auto 0;
        /* background: rgba(0, 0, 0, 0.2); */
    }

    .carousel-control-prev i,
    .carousel-control-next i {
        font-size: 30px;
        position: absolute;
        top: 50%;
        display: inline-block;
        margin: -16px 0 0 0;
        z-index: 5;
        left: 0;
        right: 0;
        color: rgba(0, 0, 0, 0.8);
        text-shadow: none;
        font-weight: bold;
    }

    .carousel-control-prev i {
        margin-left: -3px;
    }

    .carousel-control-next i {
        margin-right: -3px;
    }

    .carousel .item-price {
        font-size: 13px;
        padding: 2px 0;
    }

    .carousel .item-price strike {
        color: #999;
        margin-right: 5px;
    }

    .carousel .item-price span {
        color: #86bd57;
        font-size: 110%;
    }

    .carousel .carousel-indicators {
        bottom: -50px;
    }

    .carousel-indicators li,
    .carousel-indicators li.active {
        width: 10px;
        height: 10px;
        margin: 4px;
        border-radius: 50%;
        border-color: transparent;
        border: none;
    }

    .carousel-indicators li {
        background: rgba(0, 0, 0, 0.2);
    }

    .carousel-indicators li.active {
        background: rgba(0, 0, 0, 0.6);
    }

    .star-rating li {
        padding: 0;
    }

    .star-rating i {
        font-size: 14px;
        color: #ffc000;
    }

    /*Barra de rolagem*/
    ::-webkit-scrollbar-track {
        /* background-color: #F4F4F4; */
        background-color: darkgreen;
    }

    ::-webkit-scrollbar {
        width: 5px;
        /* background: #F4F4F4; */
        background: darkgreen;
    }

    ::-webkit-scrollbar-thumb {
        /* background: #353130; */
        background: darkgreen;
    }

    /*Rodapé*/
    div#footer {
        font-family: monospace;
        color: #e3e2e0;
        position: relative;
        height: 60px;
    }

    div#textofooter {
        position: relative;
        text-align: center;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    /*Login*/
    #login {
        /* display: flex; */
        align-items: center;
        justify-content: center;
        /* height: 100vh; */
        font-family: monospace;
        line-height: 10px;
        text-align: center;
        background-color: #353130;
    }

    /* Styling modal */
    .modal:before {
        content: '';
        display: inline-block;
        height: 100%;
        vertical-align: middle;
    }

    .modal-dialog {
        display: inline-block;
        vertical-align: middle;
    }

    .modal .modal-content {
        padding: 20px 20px 20px 20px;
        -webkit-animation-name: modal-animation;
        -webkit-animation-duration: 0.5s;
        animation-name: modal-animation;
        animation-duration: 0.5s;
    }

    @-webkit-keyframes modal-animation {
        from {
            top: -100px;
            opacity: 0;
        }

        to {
            top: 0px;
            opacity: 1;
        }
    }

    @keyframes modal-animation {
        from {
            top: -100px;
            opacity: 0;
        }

        to {
            top: 0px;
            opacity: 1;
        }
    }

    /*input*/
    input:invalid {
        border-color: red !important;
    }

    input:valid {
        border-color: green !important;
    }
</style>

<body>
    <div id="resultado"></div>
    <div id="camera"></div>

    <script src="js/quagga.min.js"></script>
    <script>
        Quagga.init({
            inputStream: {
                name: "Live",
                type: "LiveStream",
                target: document.querySelector('#camera') // Or '#yourElement' (optional)
            },
            decoder: {
                readers: ["code_128_reader"]
            }
        }, function(err) {
            if (err) {
                console.log(err);
                return
            }
            console.log("Initialization finished. Ready to start");
            Quagga.start();
        });

        Quagga.onDetected(function(data) {
            //  console.log(data);
            var result = document.querySelector('#resultado').innerHTML = data.codeResult.code;
            // result.innerHTML = data.codeResult.code;
        });
    </script>
    
    <!--Menu-->
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: darkgreen; color: #ffffff;"> <!-- #353130 -->
        <a class="navbar-brand" href="#" style="margin-left: 1%;"><img src="img/<?php echo $logo ?>" alt="<?php echo $nomeempresa ?>"></a>
        <span id="user-login"></span>
        <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Alterna navegação">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse ml-auto" id="navbarNav" style="margin-left: 1%;">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item ml-auto">
                    <a class="nav-link" href="#ofertadodia" style="color: white;">Oferta do dia</a>
                </li>
                <li class="nav-item ml-auto">
                    <a class="nav-link" href="#departamentos" style="color: white;">Departamentos</a>
                </li>
                <li class="nav-item ml-auto">
                    <a class="nav-link" href="#quemsomos" style="color: white;">Quem Somos</a>
                </li>
                <li class="nav-item ml-auto">
                    <a class="nav-link" href="#contato" style="color: white;">Contato</a>
                </li>
                <li class="nav-item ml-auto">
                    <a class="nav-link" href="#login" data-toggle="modal" data-target="#login" style="color: white;">Cadastre-se / Login</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Modal Login-->
    <div class="container-fluid">
        <div id="login" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">LOGIN</h4>
                        <button type="button" class="close" data-dismiss="modal" onclick="limpa_login();">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form id="login-form" method="POST">
                            <span id="msgAlerta"></span>
                            <div class="form-group">
                                <label id="texto">Usuário</label>
                                <input class="form-control" onkeyup="validar();" type="text" name="usuario" id="usuario" placeholder="Usuário" required="required" autofocus /><br>
                                <!-- <select name="usuarios" id="usuarios">
                                                    <option value="">Selecione</option>
                                                </select>  document.getElementById('login-form').submit() -->
                            </div>
                            <div class="form-group">
                                <label>Senha</label>
                                <input class="form-control cpf" onkeyup="validar();" type="password" name="senha" id="senha" placeholder="Senha" required="required" /><br>
                            </div>
                            <div class="form-group">
                                <label>CPF</label>
                                <input class="form-control" onkeyup="validaCPF();" type="tel" name="cpf" id="cpf" placeholder="Senha" required="required" /><br>
                            </div>
                            <button type='submit' class='btn btn-outline-dark' name='entrar' value='login'>Acessar</button>
                        </form>
                    </div>
                    <!-- <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
    <script src="js/validacpf.js" type="text/javascript"></script>
    <script src="js/validar.js" type="text/javascript"></script>
    <script src="js/pegar-dados.js" type="text/javascript"></script>

    <?php
    include_once('incluides/conexao.php');
    $query_slides = "SELECT slides, imagem, textotitulo, texto FROM carousel Where situacao=1";
    $result_slaides = $con->prepare($query_slides);
    $result_slaides->execute();
    // $qtd_slaides = $result_slaides->rowCount();
    // var_dump($qtd_slaides);
    ?>
    <!--Slide Carousel-->
    <div id="CarouselBanner" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <?php
            $controle = 0;
            while ($controle < $result_slaides->rowCount()) {
                $ativo = '';
                if ($controle == 0) {
                    $ativo = 'active';
                }
                echo "<li data-target='#CarouselBanner' data-slide-to='$controle' class='$ativo'></li>";
                $controle++;
            }
            ?>
        </ol>
        <div class="carousel-inner">
            <?php
            $controle = 0;
            while ($row_slide = $result_slaides->fetch(PDO::FETCH_ASSOC)) {
                // var_dump($row_slide);
                extract($row_slide);
                $textotitulo = utf8_encode($row_slide['textotitulo']);
                $texto = utf8_encode($row_slide['texto']);
                $ativo = '';
                if ($controle == 0) {
                    $ativo = 'active';
                }
                echo "<div class='carousel-item $ativo'>
                        <img class='d-block w-100' style='height: 300px;' src='img/carousel/$slides/$imagem'>
                        <div class='carousel-caption d-none d-md-block' style='text-shadow: 0.1em 0.1em 0.2em #0000006c;'>
                            <span style='font-size: 50px;'>$textotitulo</span>
                            <p style='font-size: x-large;'>$texto</p>
                        </div>
                    </div>";
                $controle++;
            }
            ?>
        </div>
        <a class="carousel-control-prev" href="#CarouselBanner" data-slide="prev">
            <i class="fa fa-angle-left"></i>
        </a>
        <a class="carousel-control-next" href="#CarouselBanner" data-slide="next">
            <i class="fa fa-angle-right"></i>
        </a>
    </div>

    <div style='background-color: darkgreen; height: 15px;'></div>

    <?php
    include_once 'incluides/conexao.php';
    $query_produtos = "SELECT idprodutos, codigo, descricao, imagem, preco_atual, preco_anterior FROM produtos Where situacao=1";
    $result_produtos = $con->prepare($query_produtos);
    $result_produtos->execute();
    $qtd_produtos = $result_produtos->rowCount();
    // var_dump($qtd_produtos);
    $ocultar = '';
    if ($qtd_produtos == '0') {
        $ocultar = 'hidden';
    }
    ?>
    <!-- Carousel Produtos -->
    <div class="container">
        <div class="row">
            <div class="col-md-12 <? echo $ocultar ?>">
                <h2>Nossos <b>Produtos</b></h2>
                <div id="CarouselProdutos" class="carousel slide" data-ride="carousel" data-interval="3000">
                    <!-- Carousel indicators -->
                    <ol class="carousel-indicators">
                        <?php
                        $controle = 0;
                        while ($controle < $result_produtos->rowCount()) {
                            $ativo = '';
                            if ($controle == 0) {
                                $ativo = 'active';
                            }
                            echo "<li data-target='#CarouselBanner' data-slide-to='$controle' class='$ativo'></li>";
                            $controle++;
                        }
                        ?>
                    </ol>
                    <!-- Wrapper for carousel items -->
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row">
                                <?php
                                $controle = 0;
                                while ($row_produtos = $result_produtos->fetch(PDO::FETCH_ASSOC)) {
                                    // var_dump($row_produtos);
                                    extract($row_produtos);
                                    $descricao = utf8_encode($row_produtos['descricao']);
                                    $imagem = $row_produtos['imagem'];
                                    $ativo = '';
                                    if ($controle == 0) {
                                        $ativo = 'active';
                                    }
                                    echo "<div class='col-sm-3'>";
                                    echo "<div class='thumb-wrapper'>";
                                    echo "<div class='img-box'>";
                                    echo "<img src='img/produtos/$imagem' class='img-fluid' alt='$descricao'>";
                                    echo "</div>";
                                    echo "<div class='thumb-content'>";
                                    echo "<h4>$descricao</h4>";
                                    echo "<p class='item-price'><strike>R$ $preco_anterior</strike> <span>R$ $preco_atual</span></p>";
                                    echo "<div class='star-rating'>";
                                    echo "<ul class='list-inline'>";
                                    echo "<li class='list-inline-item'><i class='fa fa-star'></i></li>";
                                    echo "<li class='list-inline-item'><i class='fa fa-star'></i></li>";
                                    echo "<li class='list-inline-item'><i class='fa fa-star'></i></li>";
                                    echo "<li class='list-inline-item'><i class='fa fa-star'></i></li>";
                                    echo "<li class='list-inline-item'><i class='fa fa-star-half-o'></i></li>";
                                    echo "</ul>";
                                    echo "</div>";
                                    echo "<a href='#' class='btn btn-primary bi bi-cart4'> Comprar</a>";
                                    echo "</div>";
                                    echo "</div>";
                                    echo "</div>";
                                    $controle++;
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <?php
                    if ($qtd_produtos = $result_produtos->rowCount()) {
                        // <!-- Carousel controls -->
                        echo "<a class='carousel-control-prev' href='#CarouselProdutos' data-slide='prev'>";
                        echo "<i class='fa fa-angle-left'></i>";
                        echo "</a>";
                        echo "<a class='carousel-control-next' href='#CarouselProdutos' data-slide='next'>";
                        echo "<i class='fa fa-angle-right'></i>";
                        echo "</a>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <!-- <div style='background-color: darkgreen; height: 15px;'></div> -->

    <!--Rodapé-->
    <footer>
        <div class="container-fluid">
            <div class="row">
                <div id="footer" class="col" style="background-color: darkgreen;">
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