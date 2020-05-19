
let aProdutos = new Array();

/**
 * Função chaamada ao confirmar o cadastro da 
 * @returns {void}
 */
const validaSubmit = function() {
	if(aProdutos.length > 0 && validaInformacoes()){
		$('<input>').attr({
			type: 'hidden',
			id: 'produtos',
			name: 'produtos',
			value: JSON.stringify(aProdutos)
		}).appendTo('form');
		
		$("#w0").submit();
	}
	else {
		alert('É preciso informar pelo menos um produto e os campos da aba Informações da ');
	}
}

/**
 * Verifica o preenchimento de todos os campos obrigatórios da aba 'Entrada'
 * @returns {Boolean}
 */
const validaInformacoes = function(){
	return ($('#saida-tipo_said_codigo').val() && $('#saida-said_data').val()) ?  true : false;
}

/**
 * Adiciona uma linha ao grid de produtos
 * @param {objetc} oButton Objeto clicado
 * @returns {void}
 */
const adicionaLinhaGrid = function(oButton) {	
	$(oButton).blur();
	
	let oProduto = {
		prod_codigo: $('#produtoentrada-prod_descricao').attr('produto'),
		produto_nome: $('#produtoentrada-prod_descricao').attr('nome'),
		said_prod_quantidade: $('#saidaproduto-said_prod_quantidade').val()
	};

	if(produtoValido(oProduto)) {
		$('#em_branco').remove(); // Remove a linha de grid vazio

		$('#produtos_saida tbody').append('<tr>\n\
										<td>' + oProduto.prod_codigo + '</td>\n\
										<td>' + oProduto.produto_nome + '</td>\n\
										<td>' + oProduto.said_prod_quantidade + '</td>\n\
									</tr>');
		aProdutos.push(oProduto);
		
		limpaCampos();
	}
}

const limpaCampos = function(){
	$('#produtoentrada-prod_descricao, #saidaproduto-said_prod_quantidade').val('');
	$('.field-produtoentrada-prod_descricao, .field-saidaproduto-said_prod_quantidade').removeClass('has-error').removeClass('has-success');

	/*Investigar no futuro pra tirar isso aqui 
	 * Por algum motivo está voltando e validando o último campo novamente, apensar de 
	 */
	setTimeout(function(){
		$('.field-saidaproduto-said_prod_quantidade').removeClass('has-error').removeClass('has-success');
		$('.field-saidaproduto-said_prod_quantidade .help-block').text('');
	}, 200); 
}


/**
 * Define o valor de um atributo extra para posterior manipulação
 * @param {object} oEventoJquery
 * @param {object} oObjetoDados
 * @returns {void}
 */
const adicionaAtributo = function(oEventoJquery, oObjetoDados) {	
	if(oObjetoDados.item){
		$('#produtoentrada-prod_descricao').attr('produto', oObjetoDados.item.valor).attr('nome', oObjetoDados.item.label)
	}
	else{
		$('#produtoentrada-prod_descricao').removeAttr('produto').removeAttr('nome');
	}
}

/**
 * Valida os campos das informações do produto a ser adicionado o grid.
 * Caso não seja válido, mostrará a mensagem de campo obrigatório.
 * @returns {Boolean}
 */
const produtoValido = function(oProduto) {
	if(oProduto.prod_codigo && oProduto.said_prod_quantidade){
		return true;
	}
	else {	
		$('#produtoentrada-prod_descricao, #produto-entr_prod_quantidade').each(function (){
			if(!$(this).val()){
				 $('.field-' + $(this).attr('id')).addClass('has-error');
				 $('.field-' + $(this).attr('id') + ' .help-block').text('Campo Obrigatório');
			}
	  });
		return false;
	}
}