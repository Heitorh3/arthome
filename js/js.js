// JavaScript Document

function obrigatorio(campos) {
	var i = 1;
	var campo = '';
	
	for (i = 0; i < campos.length; i++) {
		if (campos.substr(i, 1) != '') {
			if (campos.substr(i, 1) != ';') {
				campo += campos.substr(i, 1);
			} else {
				if (document.getElementsByName(campo)[0].value == '') {
					alert(document.getElementsByName(campo)[0].title + ' é um campo de preenchimento obrigatório!');
					document.getElementsByName(campo)[0].focus();					
					return false;					
				}
				
				campo = '';
			}
		}
	}
	
	return true;
}

/*
 * Função para mudança de status de uma div
 */

function mudaImagem(id) {
	var cn1 = 3;
	var cn2 = 1;
	
	if (navigator.appName == 'Microsoft Internet Explorer') {
		cn1 = 1;
		cn2 = 0;
	}
	
	var dirImagem = id.childNodes[0].childNodes[cn2].src.substr(0, id.childNodes[0].childNodes[cn2].src.length - 5);
    var extImagem = id.childNodes[0].childNodes[cn2].src.substr(id.childNodes[0].childNodes[cn2].src.length - 4, id.childNodes[0].childNodes[cn2].src.length);
	
	if (id.parentNode.childNodes[cn1].className == 'aberto') {
		id.parentNode.childNodes[cn1].className = 'fechado';	
    	id.childNodes[0].childNodes[cn2].src = dirImagem + '2' + extImagem;
    } else {    
    	id.parentNode.childNodes[cn1].className = 'aberto';	
    	id.childNodes[0].childNodes[cn2].src = dirImagem + '1' + extImagem;
    }
}

/*
 * Verifica se o input radio foi preenchido
 */

function validaRadio(form) {
	var preencheu = false;
	var nBotoes = form.lp.length;
	
	for (i = 0; i < nBotoes; i++) {
		if (form.lp[i].checked) {
			preencheu = true;
			break;
		}
	}
	
	if (preencheu) {
		return true;
	} else {
		alert('É necessário escolher uma linguagem de programação!');
		return false;
	}
}

/*
 * Bloqueio de letras em um determinado input text
 */

function blockLetras(e) {
	if(window.event) {
  		key = e.keyCode;
	} else if(e.which) {
		key = e.which;
	}

	if(key != 8 || key < 48 || key > 57) return (((key > 47) && (key < 58)) || (key == 8));
	{
		return true;
    }
}

function verificaCPF(campo) {
	var CPF = campo.value;
	
	var POSICAO, I, SOMA, DV, DV_INFORMADO;
	var DIGITO = new Array(10);
	DV_INFORMADO = CPF.substr(9, 2); // Retira os dois últimos dígitos do número informado
	
	for (I = 0; I <= 8; I++) {
		DIGITO[I] = CPF.substr( I, 1);
	}
	
	POSICAO = 10;
	SOMA = 0;
	for (I = 0; I <= 8; I++) {
		SOMA = SOMA + DIGITO[I] * POSICAO;
		POSICAO = POSICAO - 1;
	}
	
	DIGITO[9] = SOMA % 11;
   	if (DIGITO[9] < 2) {
        DIGITO[9] = 0;
	} else {
		DIGITO[9] = 11 - DIGITO[9];
	}
	
	POSICAO = 11;
	SOMA = 0;
	for (I=0; I<=9; I++) {
		SOMA = SOMA + DIGITO[I] * POSICAO;
		POSICAO = POSICAO - 1;
	}
	
	DIGITO[10] = SOMA % 11;
	if (DIGITO[10] < 2) {
		DIGITO[10] = 0;
	} else {
	   DIGITO[10] = 11 - DIGITO[10];
	}
	
	DV = DIGITO[9] * 10 + DIGITO[10];
	if (DV != DV_INFORMADO) {
		alert('CPF inválido');
		campo.value = '';
		campo.focus();
		return false;
   }
   
   /*
    * Verifica se exite algum CPF cadastrado no banco de dados
	* Essa verificação é feita através de Ajax
	*/
	
	if (window.XMLHttpRequest) {
		req = new XMLHttpRequest();
	} else if (window.ActiveXObject) {
		req = new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	var url = 'valida_cpf.php?campo=cpf&valor=' + CPF;
	
	req.open('get', url, true);
	
	req.onreadystatechange = function() {
		
		if (req.readyState == 1) {
			document.getElementById('campo_cpf').innerHTML = '<font>Verificando...</font>';
		}
		
		if (req.readyState == 4 && req.status == 200) {
			var resposta = req.responseText;
	 		document.getElementById('campo_cpf').innerHTML = resposta;
			document.getElementByID('flagCPF').innerHTL = '<input name="flagCPF" type="hidden" value="error" />';
		}
	}
	
	req.send(null);
}

function verificaCPF_componente(campo) {
	var CPF = campo.value;
	
	var POSICAO, I, SOMA, DV, DV_INFORMADO;
	var DIGITO = new Array(10);
	DV_INFORMADO = CPF.substr(9, 2); // Retira os dois últimos dígitos do número informado
	
	for (I = 0; I <= 8; I++) {
		DIGITO[I] = CPF.substr( I, 1);
	}
	
	POSICAO = 10;
	SOMA = 0;
	for (I = 0; I <= 8; I++) {
		SOMA = SOMA + DIGITO[I] * POSICAO;
		POSICAO = POSICAO - 1;
	}
	
	DIGITO[9] = SOMA % 11;
   	if (DIGITO[9] < 2) {
        DIGITO[9] = 0;
	} else {
		DIGITO[9] = 11 - DIGITO[9];
	}
	
	POSICAO = 11;
	SOMA = 0;
	for (I=0; I<=9; I++) {
		SOMA = SOMA + DIGITO[I] * POSICAO;
		POSICAO = POSICAO - 1;
	}
	
	DIGITO[10] = SOMA % 11;
	if (DIGITO[10] < 2) {
		DIGITO[10] = 0;
	} else {
	   DIGITO[10] = 11 - DIGITO[10];
	}
	
	DV = DIGITO[9] * 10 + DIGITO[10];
	if (DV != DV_INFORMADO) {
		alert('CPF inválido');
		campo.value = '';
		campo.focus();
		return false;
   }
}
