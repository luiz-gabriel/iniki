const BTN = document.getElementsByClassName('btn')[0];
let num = document.getElementsByTagName('input')[0];
let msg = document.getElementsByTagName('input')[1];

//Filtara a mensagem para fazer o link
function filtrarMensagem(){
	var mensagem = msg.value;

	mensagem = mensagem.replace(" ", "%20");

	return mensagem;
}

BTN.onclick = function (){

	if (num.value == 0) {
		num.placeholder = 'Campo obrigadorio*';
	}
	else {

			//-----------------------------------

			let div = document.createElement('div');
			div.className = 'model';

			let h1 = document.createElement('h1');
			h1.className = 'titulo';
			h1.innerText = 'Iniki.XYZ'

			let h2 = document.createElement('h1');
			h2.className = 'titulo';
			h2.innerText = 'SEU LINK ESTÁ ABAIXO:';

			let painel = document.createElement('input');
			painel.className = 'painel';
			painel.value = `https://api.whatsapp.com/send?phone=55${num.value}&text=${filtrarMensagem()}`;


			//Botão para copiar o link do whatsapp gerado
			let btn_link = document.createElement('button');
			btn_link.className = 'btn_link';
			btn_link.innerText = 'Copiar link';

			//Botão de close
			let btn_close = document.createElement('button');
			btn_close.className = 'btn_link';
			btn_close.innerText = 'Fechar';

			btn_close.onclick = function(){
				div.remove();
			}

			div.appendChild(h1);
			div.appendChild(h2);
			div.appendChild(painel);
			div.appendChild(btn_link);
			div.appendChild(btn_close);

			document.body.appendChild(div);

			//Botão de copiar link

			btn_link.addEventListener('click', function(){

				painel.select();

				document.execCommand('copy');
			});
	}

}
