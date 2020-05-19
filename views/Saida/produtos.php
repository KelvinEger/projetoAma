<?php

use yii\jui\AutoComplete;

use yii\helpers\Html;
use app\models\ProdutoEntrada;
use app\models\SaidaProduto;
use yii\helpers\Url;

$oSaidaProduto   = new SaidaProduto();
$oProduto        = new ProdutoEntrada();

echo $form->field($oProduto, 'prod_descricao')->widget(AutoComplete::classname(), [
   'attribute'     => 'prod_descricao',
	'options'       => ['class'  => 'form-control'],
	'clientEvents'  => ['change' => "function (oEvento, oObjetoDados){ adicionaAtributo(oEvento, oObjetoDados); }"],
   'clientOptions' => ['source' => $oProduto->getProdutosOrganizados(['situacao' => 1])]
]);

echo $form->field($oSaidaProduto, 'said_prod_quantidade')->input('number');

echo Html::button('Adicionar', ['class'   => 'btn btn-primary',
										  'onclick' => 'adicionaLinhaGrid(this);'
										 ]);

echo '<div id="produtos_saida" class="grid-view">
			<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<th>Produto</th>
						<th>Nome</th>
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

