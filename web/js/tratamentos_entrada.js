
let aProdutos = new Array();

/**
 * Função chaamada ao confirmar o cadastro da entrada
 * @returns {void}
 * @todo implementar toda a validação
 */
function validaSubmit() {
	if(aProdutos.length > 0){
		$('<input>').attr({
			type: 'hidden',
			id: 'produtos',
			name: 'produtos',
			value: JSON.stringify(aProdutos)
		}).appendTo('form');
	}
	else{
		alert('É preciso informar pelo menos um produto.');
	}
}


/**
 * Adiciona uma linha ao grid de produtos
 * @param {objetc} oButton Objeto clicado
 * @returns {void}
 */
function adicionaLinhaGrid(oButton) {
	console.log('mds')
	
	
	$(oButton).blur();
	
	let oProduto = {
		produto: $('#produtoentrada-prod_descricao').attr('produto'),
		produto_nome: $('#produtoentrada-prod_descricao').attr('nome'),
		lote: $('#lote-lote_descricao').val(),
		validade: $('#lote-lote_validade').val(),
		quantidade: $('#entradaproduto-entr_prod_quantidade').val()
	};


	if(produtoValido(oProduto)) {
		$('#em_branco').remove(); // Remove a linha de grid vazio

		$('#w1 tbody').append('<tr>\n\
										<td>' + oProduto.produto + '</td>\n\
										<td>' + oProduto.produto_nome + '</td>\n\
										<td>' + oProduto.lote + '</td>\n\
										<td>' + oProduto.validade + '</td>\n\
										<td>' + oProduto.quantidade + '</td>\n\
									</tr>');
		aProdutos.push(oProduto);
		
		limpaCampos();
	}
	else{
		alert('Erro');
	}
}

function limpaCampos(){
	$('#produtoentrada-prod_descricao, #lote-lote_descricao, #lote-lote_validade, #entradaproduto-entr_prod_quantidade').val('').parent().parent().removeClass('has-error');
	$('.field-produto-prod_descricao, .field-lote-lote_descricao, .field-lote-lote_validade, .field-entradaproduto-entr_prod_quantidade').removeClass('has-error').removeClass('has-success');

	/*Investigar no futuro pra tirar isso aqui 
	 * Por algum motivo está voltando e validando o último campo novamente, apensar de 
	 */
	setTimeout(function(){
		$('.field-entradaproduto-entr_prod_quantidade').removeClass('has-error');
		$('.field-entradaproduto-entr_prod_quantidade .help-block').text('');
	}, 200); 
}

/**
 * Define o valor de um atributo extra para posterior manipulação
 * @param {object} oEventoJquery
 * @param {object} oObjetoDados
 * @returns {void}
 */
function adicionaAtributo(oEventoJquery, oObjetoDados) {	
	(oObjetoDados.item) ? $('#produtoentrada-prod_descricao').attr('produto', oObjetoDados.item.valor).attr('nome', oObjetoDados.item.label) : $('#produtoentrada-prod_descricao').removeAttr('produto').removeAttr('nome');
}

/**
 * @todo Implementar método que validará os campos da aba, se estão válidos.
 * @returns {Boolean}
 */
function produtoValido() {
	if($('#produtoentrada-prod_descricao').val() &&
		$('#lote-lote_descricao').val() &&
		$('#lote-lote_validade').val() &&
		$('#entradaproduto-entr_prod_quantidade').val()){
		return true;
	}
	else {	
		return false;
	}
}