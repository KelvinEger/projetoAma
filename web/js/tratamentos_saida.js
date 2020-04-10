
let aProdutos = new Array();

/**
 * Função chaamada ao confirmar o cadastro da entrada
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
		
		$("form").submit();
	}
	else {
		alert('É preciso informar pelo menos um produto e os campos da aba Informações da entrada');
	}
}

/**
 * Verifica o preenchimento de todos os campos obrigatórios da aba 'Entrada'
 * @returns {Boolean}
 */
const validaInformacoes = function(){
	return ($('#entrada-entr_tipo_codigo').val() && $('#entrada-entr_data').val() && $('#entrada-entr_valor_total').val()) ?  true : false;
}

/**
 * Adiciona uma linha ao grid de produtos
 * @param {objetc} oButton Objeto clicado
 * @returns {void}
 */
const adicionaLinhaGrid = function(oButton) {
	$(oButton).blur();
	
	let oProduto = {
		produto: $('#produtoentrada-prod_descricao').attr('produto'),
		produto_nome: $('#produtoentrada-prod_descricao').attr('nome'),
		lote: $('#loteentrada-lote_descricao').val(),
		validade: $('#loteentrada-lote_validade').val(),
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
}

const limpaCampos = function(){
	$('#produtoentrada-prod_descricao, #loteentrada-lote_descricao, #loteentrada-lote_validade, #entradaproduto-entr_prod_quantidade').val('');
	$('.field-produto-prod_descricao, .field-loteentrada-lote_descricao, .field-loteentrada-lote_validade, .field-entradaproduto-entr_prod_quantidade').removeClass('has-error').removeClass('has-success');

	/*Investigar no futuro pra tirar isso aqui 
	 * Por algum motivo está voltando e validando o último campo novamente, apensar de 
	 */
	setTimeout(function(){
		$('.field-entradaproduto-entr_prod_quantidade').removeClass('has-error');
		$('.field-entradaproduto-entr_prod_quantidade .help-block').text('');
	}, 200); 
}

/**
 * Seta os lotes do produto informado no campo 'Lote'
 * @param {int} iProduto
 * @returns {void}
 */
const getLotes = function(iProduto, sRota){
	$.get(sRota, {
		 iProduto : iProduto
	}, function(msg){
		 $("#resultado").html(msg);
	});
}

/**
 * Define o valor de um atributo extra para posterior manipulação
 * @param {object} oEventoJquery
 * @param {object} oObjetoDados
 * @returns {void}
 */
const adicionaAtributo = function(oEventoJquery, oObjetoDados, sRota) {	
	if(oObjetoDados.item){
		$('#produtoentrada-prod_descricao').attr('produto', oObjetoDados.item.valor).attr('nome', oObjetoDados.item.label)
		getLotes(oObjetoDados.item.valor, sRota);
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
const produtoValido = function() {
	if($('#produtoentrada-prod_descricao').val() &&
		$('#loteentrada-lote_descricao').val() &&
		$('#loteentrada-lote_validade').val() &&
		$('#entradaproduto-entr_prod_quantidade').val()){
		return true;
	}
	else {	
		$('#produtoentrada-prod_descricao, #loteentrada-lote_descricao, #loteentrada-lote_validade, #entradaproduto-entr_prod_quantidade').each(function (){
			if(!$(this).val()){
				 $('.field-' + $(this).attr('id')).addClass('has-error');
				 $('.field-' + $(this).attr('id') + ' .help-block').text('Campo Obrigatório');
			}
	  });
		return false;
	}
}