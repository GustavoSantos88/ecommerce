<?php

/// conexao com o banco apenas uma vez
include_once '../incluides/conexao.php';

// receber os dados enviado pelo javascript
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (empty($dados['usuario'])) {
    $retorna = ['status' => false, 'msg' => "<p style='color: #f00;'>É necessário preencher o Usuário!</p>"];
} elseif (empty($dados['senha'])) {
    $retorna = ['status' => false, 'msg' => "<p style='color: #f00;'>É necessário preencher o Senha!</p>"];
} else {

    $query = "INSERT INTO usuarios (usuario, senha) VALUES (:usuario, :senha)";
    $cadastro_cliente = $con->prepare($query);
    $cadastro_cliente->bindParam(':usuario', $dados['usuario']);
    $cadastro_cliente->bindParam(':senha', $dados['senha']);
    $cadastro_cliente->execute();

    if ($cadastro_cliente->rowCount()) {
        $retorna = ['status' => true, 'msg' => "<p style='color: green;'>Usuário cadastrado com sucesso!<br><br>Realise o login.</p>"];
    } else {
        $retorna = ['status' => false, 'msg' => "<p style='color: #f00;'>Usuário não cadastrado!<br><br>Verifique e tente novamente.</p>"];
    }
}

echo json_encode($retorna);
