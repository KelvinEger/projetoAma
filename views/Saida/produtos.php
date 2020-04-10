<?php

use yii\jui\AutoComplete;
use app\models\Lote;
use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Produto;
use app\models\SaidaProduto;
use yii\helpers\Url;

$oLote           = new Lote();
$oSaidaProduto   = new SaidaProduto();
$oProduto        = new Produto();

echo $form->field($oProduto, 'prod_descricao')->widget(AutoComplete::classname(), [
   'attribute'     => 'prod_descricao',
	'options'       => ['class'  => 'form-control'],
	'clientEvents'  => ['change' => "function (oEvento, oObjetoDados){ adicionaAtributo(oEvento, oObjetoDados, '".Url::to(['lote/lotes'])."'); }"],
   'clientOptions' => ['source' => $oProduto->getProdutosOrganizados(['situacao' => 1])]
]);

echo $form->field($oLote, 'lote_descricao')->dropDownList( ['' => 'Selecione'] );
echo $form->field($oLote, 'lote_validade')->input('date');
echo Html::button('Adicionar', ['class'   => 'btn btn-primary',
										  'onclick' => 'adicionaLinhaGrid(this);'
										 ]);

echo '<div id="w1" class="grid-view">
			<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<th>Produto</th>
						<th>Nome</th>
						<th>Lote</th>
						<th>Quantidade</th>
					</tr>
				</thead>
				<tbody>
					<tr id="em_branco">
						<td colspan="5" style="text-align:center"><span>Informe um produto</span></td>
					</tr>
				</tbody>
			</table>
		</div>';

