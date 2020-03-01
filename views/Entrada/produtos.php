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
	 'options'       => ['class' => 'form-control'],
    'clientOptions' => ['source' => $oProduto->getProdutosOrganizados(['situacao' => 1]), 
								 'label' => 'teste']
]);

echo $form->field($oLote, 'lote_descricao');
echo $form->field($oLote, 'lote_validade')->input('date');
echo $form->field($oEntradaProduto, 'entr_prod_quantidade')->textInput(['type' => 'number', 'min' => 0]);
echo Html::button('Adicionar', ['class'=>'btn btn-primary',
										  'onclick'=>"adicionaLinhaGrid();"
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
	 * @returns {undefined}
	 */
	function adicionaLinhaGrid(){
		$('#w1 tbody .empty').parent().parent().remove(); // Remove a linha de grid vazio
				
		$('#w1 tbody').append('<tr>\n\
										<td>1</td>\n\
										<td>2</td>\n\
										<td>3</td>\n\
										<td>4</td>\n\
										<td>6</td>\n\
									</tr>');
	}
</script>