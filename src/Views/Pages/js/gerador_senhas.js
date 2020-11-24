//Comandos de entrada
const caractere = document.getElementById('quant_carac');
const numero = document.getElementById('numeros');
const maiuscula = document.getElementById('maiuscula');
const minuscula = document.getElementById('minuscula');
const simbolo = document.getElementById('especial');
const botao = document.getElementById('btn');
const senhaCampo = document.getElementById('senhaCampo');
const btn_copiar = document.getElementById('copiar');

//Funçoes geradoras
function gerarNumero(){
    return Math.floor(Math.random()*10);
}

function gerarMaiuscula(){
    let maiuscula = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','X','W','Y','Z'];
    return maiuscula[Math.floor(Math.random()*26)];
}

function gerarMinuscula(){
    let minuscula = ['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','x','w','y','z'];
    return minuscula[Math.floor(Math.random()*26)];
}

function gerarSimbolo(){
    let simbolo = ['!','@','#','$','%','&','*','(',')'];
    return simbolo[Math.floor(Math.random() * 9)];
}
// Função verivicar
function verificar(x){
    switch(x){
        case 0: return numero;
        case 1: return maiuscula;
        case 2: return minuscula;
        case 3: return simbolo;
    }
}

/*LOGICA PARA GERAR A SENHA*/
botao.onclick = function (){
    var senha = '';
    var num_caractere = caractere.value;

    if (numero.checked || maiuscula.checked || minuscula.checked || simbolo.checked) {

        for(var i = 0; i < num_caractere;){
            var valorAleatorio = Math.floor(Math.random()*4);

            var funcoes = [gerarNumero(),gerarMaiuscula(),gerarMinuscula(),gerarSimbolo()];

            if (verificar(valorAleatorio).checked){
                senha += funcoes[valorAleatorio];
                i++;
            }
        }

        senhaCampo.value = senha;

        document.getElementsByClassName('senha-gerada')[0].style.display = 'flex';
    }
    else{
        alert('selecione um campo!');
    }
}

btn_copiar.onclick = function (){
    senhaCampo.select();
    document.execCommand('copy');
}
