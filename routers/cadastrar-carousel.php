<?php
include_once '../incluides/conexao.php';
if (isset($_GET['id']) && !empty($_GET['imagem'])) {
    $id = $_GET['id'];
    $imagem = $_GET['imagem'];
    $situacao = '';
    if (isset($_GET['excluir'])) {
        if ($_GET['excluir'] == 'sim') {
            #Excluir Imagem Carousel
            $query_carousel = "DELETE FROM carousel Where slides='$id'";
            $result_carousel = $con->prepare($query_carousel);
            $result_carousel->execute();
            if ($result_carousel->rowCount()) {
                // echo 'excluiu';
            }
        }
    }
    if (isset($_GET['ativo'])) {
        if ($_GET['ativo'] == 'sim') {
            $situacao = 1;
        }
    }
    if (isset($_GET['desativar'])) {
        if ($_GET['desativar'] == 'sim') {
            $situacao = 0;
        }
    }
    if ($situacao == '0' || $situacao == '1') {
        $query_carousel = "UPDATE carousel SET situacao='$situacao' Where slides='$id'";
        $result_carousel = $con->prepare($query_carousel);
        $result_carousel->execute();
        if ($result_carousel->rowCount()) {
            // echo 'update';
        }
    }
}
header('Location: ../admin-page.php');
