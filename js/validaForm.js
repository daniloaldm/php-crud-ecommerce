function validar_form(){
    let nome = formcad.nome.value;
    let preco = formcad.preco.value;
    let descricao = formcad.descricao.value;
    let imagem = formcad.imagem.value;

    if(nome == "" || preco == "" || descricao == "" || imagem == ""){
        alert('Verifique se todos os campos foram preenchidos!');
        return false;
    }   
}

function somenteNumeros(num){ 
    let er = /[^0-9.]/;
    er.lastIndex = 0;
    let campo = num;
    if (er.test(campo.value)) {
    campo.value = "";
    }
}

