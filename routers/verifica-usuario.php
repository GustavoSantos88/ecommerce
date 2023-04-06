<?php

// conexao com o banco apenas uma vez
include_once '../incluides/conexao.php';

// receber os dados enviado pelo javascript
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$usuario = $dados['usuario'];
$usuario = $_POST['usuario'];

if ($usuario) {
    // criar query para buscar os dados
    $query = "SELECT codusuario, usuario, senha FROM usuarios Where usuario='$usuario' Order by usuario ASC";
    $result = $con->prepare($query);
    $result->execute();

    if (($result) and ($result->rowCount() != 0)) {
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $dados[] = [
                'codusuario' => $codusuario,
                'usuario' => $usuario
            ];
        }
        $retorna = ['status' => true, 'dados' => "<p style='color: green'> Bem Vindo de Volta! </p>"];
    } else {
        // $retorna = ['status' => false, 'msg' => "<p style='color: #f00'> Usuário não encontrado! </p>"];
    }
    $retorna = ['status' => true, 'msg' => $usuario];
} else {
    $retorna = ['status' => false, 'msg' => "<p style='color: #f00'> Digite o Usuário! </p>"];
}

echo json_encode($retorna);

// header('location: index.php');
