function validacaoFormularioUser() {
    // Realizar validação dos campos do formulário
    // Se a validação falhar, retorne false para impedir o envio do formulário

    const formData = new FormData(document.querySelector('.form'));
    const p = document.querySelector(".mensagemFormUser");
    const InputEmail = document.querySelector("#email");
    const InputNome = document.querySelector("#nome");
    const InputSenha = document.querySelector("#senha");


    // Enviar os dados do formulário para outra página usando AJAX
    const xhr = new XMLHttpRequest();
    xhr.open('POST', './create/user', true);

    xhr.onload = function() {
        if (xhr.status >= 200 && xhr.status < 300) {
          
            

            if((xhr.responseText).includes("ErrPassword"))  p.innerText = "A senha precisa conter: \n1 letra maiuscula; \n1 minuscula; \n1 digito; \n8 caracteres";
                
            if((xhr.responseText).includes("ErrUser")) p.innerText = "Houve um erro no sistema, não foi possivel criar o usuario";
                
            if((xhr.responseText).includes("Sucesso")) {
                p.innerText = "Usuario criado com sucesso";
                InputEmail.value = "";
                InputNome.value = "";
                InputSenha.value = "";
                location.reload();

            }
            
            
        } else {
            console.error('Erro ao fazer a requisição: ' + xhr.status);
        }
    };
   
    xhr.send(formData);

 

    return false;
}



function excluirUsuario(id){
    const xhr = new XMLHttpRequest();
    xhr.open('DELETE', `./delete/user/${id}`, true);

    xhr.onload = function() {
        if (xhr.status >= 200 && xhr.status < 300) {

            if((xhr.responseText).includes("ErrDeleteUser")){ alert("Não foi possivel excluir o usuario"); }
            else{
            location.reload();
            }
            
        } else {
            console.error('Erro ao fazer a requisição: ' + xhr.status);
        }
    };
   
    xhr.send();

    return false;

}

function excluirEtapa(id){
    const xhr = new XMLHttpRequest();
    xhr.open('DELETE', `./delete/etapa/${id}`, true);

    xhr.onload = function() {
        if (xhr.status >= 200 && xhr.status < 300) {
            console.log(xhr.responseText);
            if((xhr.responseText).includes("ErrDeleteEtapa")){ alert("Não foi possivel excluir a etapa"); }
            else{
            location.reload();
            }
            
        } else {
            console.error('Erro ao fazer a requisição: ' + xhr.status);
        }
    };
   
    xhr.send();

    return false;
}

function excluirWorkspace(id){
    const xhr = new XMLHttpRequest();
    xhr.open('DELETE', `./delete/workspace/${id}`, true);

    xhr.onload = function() {
        if (xhr.status >= 200 && xhr.status < 300) {
            console.log(xhr.responseText);
            if((xhr.responseText).includes("ErrDeleteWorkspace")){ alert("Não foi possivel excluir a workspace"); }
            else{
            location.reload();
            }
            
        } else {
            console.error('Erro ao fazer a requisição: ' + xhr.status);
        }
    };
   
    xhr.send();

    return false;
}
