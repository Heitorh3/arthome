// JavaScript Document

function ativar(id, status) {
	if(status == 0) {
		var resposta = window.confirm('Deseja ativar o usu�rio cujo o c�digo � ' + id + '?');
	} else {
		var resposta = window.confirm('Deseja desativar o usu�rio cujo o c�digo � ' + id + '?');
	} 
	
	if(resposta) {
		location = 'ativar_usuario.php?id=' + id + '&status=' + status;
	}
}

function deletar(id) {
	var resposta = window.confirm('Deseja remover o registro de n�mero ' + id + '?');
	
	if(resposta) {
		location = 'remocoes/remover_usuario.php?id=' + id;
	}
}
