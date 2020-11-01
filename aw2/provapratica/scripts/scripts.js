const form = document.getElementById("form-popup");
const usuarios = document.getElementById("usuarios");

function createForm(idusuario){

    if (!popupFormExists()){

        //Criação do formulário, dos seus inputs e botões
        const formulario = createFormFields('form');
        const nome = createFormFields('nome');
        const idade = createFormFields('idade');
        const email = createFormFields('email');
        const submit = createFormFields('submit');
        const cancel = createFormFields('cancel');

        //Adiciona os dados do usuário ao formulário a ser preenchido
        nome.value = document.querySelector('table tr#'+idusuario.id).getElementsByTagName('p').nome.innerHTML;
        idade.value = document.querySelector('table tr#'+idusuario.id).getElementsByTagName('p').idade.innerHTML;
        email.value = document.querySelector('table tr#'+idusuario.id).getElementsByTagName('p').email.innerHTML;

        //Cria o formulário na página
        form.appendChild(appendFields(formulario, nome, idade, email, submit, cancel));
        form.style.display = 'block';
    }
}

function destroyForm(){
    const formulario = document.querySelector("div#form-popup form");
    form.removeChild(formulario);
    form.style.display = 'none';
}

function popupFormExists(){
    return document.querySelector("div#form-popup form");
}

function createFormFields(field){
    switch (field){
        case 'form':
            const formulario = document.createElement('form');
            formulario.setAttribute('class', 'update-form');
            formulario.setAttribute('method', 'post');
            formulario.setAttribute('action', 'usuarios.php');
            return formulario;
        case 'nome':
            const nome = document.createElement('input');
            nome.setAttribute('type', 'text');
            nome.setAttribute('placeholder', 'Nome');
            nome.setAttribute('name', 'nome');
            return nome;
        case 'idade':
            const idade = document.createElement('input');
            idade.setAttribute('type', 'number');
            idade.setAttribute('placeholder', 'Idade');
            idade.setAttribute('name', 'idade');
            return idade;
        case 'email':
            const email = document.createElement('input');
            email.setAttribute('type', 'text');
            email.setAttribute('placeholder', 'E-mail');
            email.setAttribute('name', 'email');
            return email;
        case 'submit':
            const submit = document.createElement('input');
            submit.setAttribute('type', 'submit');
            submit.setAttribute('value', 'Alterar');
            submit.setAttribute('class', 'btn');
            return submit;
        case 'cancel':
            const cancel = document.createElement('button');
            cancel.setAttribute('type', 'button');
            cancel.setAttribute('value', 'Cancelar');
            cancel.setAttribute('class', 'btn cancel');
            cancel.setAttribute('onclick', 'destroyForm()');
            cancel.innerHTML = 'Cancelar';
            return cancel;
        default: return null;
    }

}

function appendFields(formulario, nome, idade, email, submit, cancel){
    formulario.appendChild(nome);
    formulario.appendChild(document.createElement('br'));
    formulario.appendChild(idade);
    formulario.appendChild(document.createElement('br'));
    formulario.appendChild(email);
    formulario.appendChild(document.createElement('br'));
    formulario.appendChild(submit);
    formulario.appendChild(document.createElement('br'));
    formulario.appendChild(cancel);

    return formulario;
}

function deleteUser(user){
    const email = document.getElementById(user.id).getElementsByTagName('p').email.innerHTML;

    const formulario = document.createElement('form');
    formulario.method = 'post';
    formulario.action = "usuarios.php";

    const hiddenField = document.createElement('input');
    hiddenField.type = 'hidden';
    hiddenField.name = 'delete';
    hiddenField.value = email;

    formulario.appendChild(hiddenField);
    usuarios.appendChild(formulario);
    formulario.submit();
    usuarios.removeChild(formulario);
}