// verifica se já foi preenchido para limpar o msgAlerta
async function validar() {
    const usuario = document.getElementById('usuario');
    if (usuario) {
        document.getElementById('msgAlerta').innerHTML = '';
    }
    const senha = document.getElementById('senha');
    if (senha) {
        document.getElementById('msgAlerta').innerHTML = '';
    }
}
async function limpa_login() {
    const formCadastro = document.getElementById('login-form');
    if (formCadastro) {
        formCadastro.reset();
    }
    // console.log(formCadastro);
}


















