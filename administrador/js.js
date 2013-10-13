// JavaScript Document

function ativar(id, status) {
	if(status == 0) {
		var resposta = window.confirm('Deseja ativar o usuário cujo o código é ' + id + '?');
	} else {
		var resposta = window.confirm('Deseja desativar o usuário cujo o código é ' + id + '?');
	} 
	
	if(resposta) {
		location = 'ativar_usuario.php?id=' + id + '&status=' + status;
	}
}

function deletar(id) {
	var resposta = window.confirm('Deseja remover o registro de número ' + id + '?');
	
	if(resposta) {
		location = 'remocoes/remover_usuario.php?id=' + id;
	}
}
