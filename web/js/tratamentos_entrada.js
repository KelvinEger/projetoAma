
let aProdutos = new Array();

/**
 * Função chaamada ao confirmar o cadastro da entrada
 * @returns {void}
 */
function validaSubmit() {
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
function adicionaLinhaGrid(oButton) {
	$(oButton).blur();
	
	let oProduto = {
		prod_codigo: $('#produtoentrada-prod_descricao').attr('produto'),
		produto_nome: $('#produtoentrada-prod_descricao').attr('nome'),
		entr_prod_quantidade: $('#entradaproduto-entr_prod_quantidade').val()
	};

	if(produtoValido(oProduto)) {
		$('#em_branco').remove(); // Remove a linha de grid vazio

		$('#w1 tbody').append('<tr>\n\
										<td>' + oProduto.prod_codigo + '</td>\n\
										<td>' + oProduto.produto_nome + '</td>\n\
										<td>' + oProduto.validade + '</td>\n\
										<td>' + oProduto.entr_prod_quantidade + '</td>\n\
									</tr>');
		aProdutos.push(oProduto);
		
		limpaCampos();
	}
}

function limpaCampos(){
	$('#produtoentrada-prod_descricao, #entradaproduto-entr_prod_quantidade').val('');
	$('.field-produto-prod_descricao, .field-entradaproduto-entr_prod_quantidade').removeClass('has-error').removeClass('has-success');

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
 * Valida os campos das informações do produto a ser adicionado o grid.
 * Caso não seja válido, mostrará a mensagem de campo obrigatório.
 * @returns {Boolean}
 */
function produtoValido() {
	if($('#produtoentrada-prod_descricao').val() && $('#entradaproduto-entr_prod_quantidade').val()){
		return true;
	}
	else {	
		$('#produtoentrada-prod_descricao, #entradaproduto-entr_prod_quantidade').each(function (){
			if(!$(this).val()){
				 $('.field-' + $(this).attr('id')).addClass('has-error');
				 $('.field-' + $(this).attr('id') + ' .help-block').text('Campo Obrigatório');
			}
	  });
		return false;
	}
}