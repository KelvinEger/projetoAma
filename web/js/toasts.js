/**
 *	Mostra um alerta de Informação no canto inferior esquerdo
 * @param {mixed} xTexto   : Texto a ser mostrado no alerta. Para mostrar uma lista pontuada, passar um Array
 * @param {String} sTitulo : Título do alerta
 * @param {integer} iTempo : Tempo e milissegundos que o toast será mostrado
 * @param {boolean} bPermiteFechar : Permite fechar a mensagem
 */
const alertaInformacao = function(xTexto, sTitulo = 'Informação!', iTempo = 5000, bPermiteFechar = true) {
	$.toast({
		heading: sTitulo,
		text: xTexto,
		showHideTransition: 'slide',
		icon: 'info',
		hideAfter: iTempo,
		allowToastClose: bPermiteFechar
	})
}

/**
 *	Mostra um alerta de Informação no canto inferior esquerdo
 * @param {mixed} xTexto   : Texto a ser mostrado no alerta. Para mostrar uma lista pontuada, passar um Array
 * @param {String} sTitulo : Título do alerta
 * @param {integer} iTempo : Tempo e milissegundos que o toast será mostrado
 * @param {boolean} bPermiteFechar : Permite fechar a mensagem
 */
const alertaAviso = function(xTexto, sTitulo = 'Atenção!', iTempo = 5000, bPermiteFechar = true) {
	$.toast({
		heading: sTitulo,
		text: xTexto,
		showHideTransition: 'slide',
		icon: 'warning',
		hideAfter: iTempo,
		allowToastClose: bPermiteFechar
	})
}

/**
 *	Mostra um alerta de Informação no canto inferior esquerdo
 * @param {mixed} xTexto   : Texto a ser mostrado no alerta. Para mostrar uma lista pontuada, passar um Array
 * @param {String} sTitulo : Título do alerta
 * @param {integer} iTempo : Tempo e milissegundos que o toast será mostrado
 * @param {boolean} bPermiteFechar : Permite fechar a mensagem
 */
const alertaErro = function(xTexto, sTitulo = 'Erro!', iTempo = 5000, bPermiteFechar = true) {
	$.toast({
		heading: sTitulo,
		text: xTexto,
		showHideTransition: 'slide',
		icon: 'error',
		hideAfter: iTempo,
		allowToastClose: bPermiteFechar
	})
}

/**
 *	Mostra um alerta de Informação no canto inferior esquerdo
 * @param {mixed} xTexto   : Texto a ser mostrado no alerta. Para mostrar uma lista pontuada, passar um Array
 * @param {String} sTitulo : Título do alerta
 * @param {integer} iTempo : Tempo e milissegundos que o toast será mostrado
 * @param {boolean} bPermiteFechar : Permite fechar a mensagem
 */
const alertaSucesso = function(xTexto, sTitulo = 'Sucesso!', iTempo = 5000, bPermiteFechar = true) {
	$.toast({
		heading: sTitulo,
		text: xTexto,
		showHideTransition: 'slide',
		icon: 'success',
		hideAfter: iTempo,
		allowToastClose: bPermiteFechar
	})
}

/*
 * Exportando as variáveis
 * @type function
 */
module.exports = alertaInformacao;
module.exports = alertaErro;
module.exports = alertaAviso;
module.exports = alertaSucesso;