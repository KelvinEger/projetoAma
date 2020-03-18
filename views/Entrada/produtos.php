<?php

use yii\jui\AutoComplete;
use app\models\Lote;
use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Produto;
use app\models\EntradaProduto;

$oLote           = new Lote();
$oProduto        = new Produto();
$oEntradaProduto = new EntradaProduto();

echo $form->field($oProduto, 'prod_descricao')->widget(AutoComplete::classname(), [
	 'model'         => $oProduto,
    'attribute'     => 'prod_descricao',
	 'options'       => ['class'  => 'form-control'],
	 'clientEvents'  => ['change' => 'function (oEvento, oObjetoDados){ adicionaAtributo(oEvento, oObjetoDados); }'],
    'clientOptions' => ['source' => $oProduto->getProdutosOrganizados(['situacao' => 1])],
	 
]);

echo $form->field($oLote, 'lote_descricao');
echo $form->field($oLote, 'lote_validade')->input('date');
echo $form->field($oEntradaProduto, 'entr_prod_quantidade')->textInput(['type' => 'number', 'min' => 0]);
echo Html::button('Adicionar', ['class'   => 'btn btn-primary',
										  'onclick' => ' adicionaLinhaGrid();'
										 ]);

echo GridView::widget([
	'dataProvider' =>$dataProvider,
	'columns'      =>[ 'Produto',
							 'Nome',
							 'Lote',
							 'Validade',
							 'Quantidade'
						]
]);

?>


<script>
	
	/**
	 * Adiciona uma linha ao grid de produtos
	 * @returns {void}
	 */
	function adicionaLinhaGrid(){
		let oProduto = { produto: $('#produto-prod_descricao').attr('produto'),
								  lote: $('#lote-lote_descricao').val(),
							 validade: $('#lote-lote_validade').val(),
						  quantidade: $('#entradaproduto-entr_prod_quantidade').val()
						   };
		
		
		if(produtoValido(oProduto)){
			$('#w1 tbody .empty').parent().parent().remove(); // Remove a linha de grid vazio
	
			$('#w1 tbody').append('<tr>\n\
										<td>' + oProduto.produto    + '</td>\n\
										<td>' + oProduto.produto    + '</td>\n\
										<td>' + oProduto.lote       + '</td>\n\
										<td>' + oProduto.validade   + '</td>\n\
										<td>' + oProduto.quantidade + '</td>\n\
									</tr>');
		}
	}
	
	/**
	 * Define o valor de um atributo extra para posterior manipulação
	 * @param {object} oEventoJquery
	 * @param {object} oObjetoDados
	 * @returns {void}
	 */
	function adicionaAtributo(oEventoJquery, oObjetoDados){
		(oObjetoDados.item) ? $('#produto-prod_descricao').attr('produto', oObjetoDados.item.valor).attr('nome', oObjetoDados.item.label) :  $('#produto-prod_descricao').removeAttr('produto').removeAttr('nome');		
	}
	
	/**
	 * @todo Implementar método que validará os campos da aba, se estão válidos.
	 * @returns {Boolean}
	 */
	function produtoValido(){
		return true;
	}
</script>