const usuario = document.getElementById('usuario');
if (usuario) {
    pegardados();
}
async function pegardados() {
    const usuariologin = document.getElementById('usuario');
    if (usuariologin) {
        usuariologin.addEventListener("input", async (e) => {
            e.preventDefault();
            // receber dados do formulario
             const dadosForm = new FormData(usuariologin);
            // enviar os dados inseridos para o banco de dados
            const dados = await fetch('routers/verifica-usuario.php', {
                method: 'POST',
                body: dadosForm
            });
            const resposta = await dados.json();
            console.log(resposta);
            if (resposta['status']) {
                document.getElementById('msgAlerta').innerHTML = '';
                // var opcoes = '<option value="">Selecione</option>';
                // var opcoes = '';
                // for (var i = 0; i < resposta.dados.length; i++) {
                //console.log(resposta.dados[i]['codusuario']);
                //console.log(resposta.dados[i]['usuario']);
                // opcoes = resposta.dados[i]['usuario'];
                // opcoes += '<option value="' + resposta.dados[i]['codusuario'] + '">' + resposta.dados[i]['usuario'] + '</option>'
                // }
                // usuarios.innerHTML = opcoes;
                var usuario = resposta.dados['usuario'];
                document.getElementById('usuario').innerHTML = usuario;
                Swal.fire({
                    // title: 'Are you sure?',
                    text: 'Bem vindo de Volta',
                    icon: 'warning',
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ok'
                });
            } else {
                document.getElementById('msgAlerta').innerHTML = resposta['msg'];
                Swal.fire({
                    // title: 'Are you sure?',
                    text: 'Digite o Usuário',
                    icon: 'warning',
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ok'
                });
            }
        });
    }
}

// válidar e cadastrar no banco de dados
const formCadastro = document.getElementById('login-form');
if (formCadastro) {
    formCadastro.addEventListener("submit", async (e) => {
        e.preventDefault();
        // receber dados do formulario
        const dadosForm = new FormData(formCadastro);
        // enviar os dados inseridos para o banco de dados
        const dados = await fetch("routers/cadastrar-usuario.php", {
            method: 'POST',
            body: dadosForm
        });
        const resposta = await dados.json();
        //console.log(resposta);
        if (resposta['status']) {
            document.getElementById('msgAlerta').innerHTML = resposta['msg'];
            formCadastro.reset(); //limpa os dados após inserir
            document.getElementById("usuario").focus();
        } else {
            document.getElementById('msgAlerta').innerHTML = resposta['msg'];
            if (resposta['msg'] === "<p style='color: #f00;'>É necessário preencher o Usuário!</p>") {
                document.getElementById("usuario").focus();
            }
            if (resposta['msg'] === "<p style='color: #f00;'>É necessário preencher o Senha!</p>") {
                document.getElementById("senha").focus();
            }
        }
    });
}

