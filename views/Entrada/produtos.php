<?php

use yii\jui\AutoComplete;
use app\models\LoteEntrada;
use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Produto;
use app\models\EntradaProduto;
use app\models\ProdutoEntrada;

$oLote           = new LoteEntrada();
$oEntradaProduto = new EntradaProduto();
$oProdutoEntrada = new ProdutoEntrada();
$oProduto        = new Produto();

echo $form->field($oProdutoEntrada, 'prod_descricao')->widget(AutoComplete::classname(), [
	'model'         => $oProdutoEntrada,
   'attribute'     => 'prod_descricao',
	'options'       => ['class'  => 'form-control'],
	'clientEvents'  => ['change' => "function (oEvento, oObjetoDados){ adicionaAtributo(oEvento, oObjetoDados); }"],
   'clientOptions' => ['source' => $oProdutoEntrada->getProdutosOrganizados(['situacao' => 1])]
]);

echo $form->field($oLote, 'lote_descricao');
echo $form->field($oLote, 'lote_validade')->input('date');
echo $form->field($oEntradaProduto, 'entr_prod_quantidade')->textInput(['type' => 'number', 'min' => 0]);
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
						<th>Validade</th>
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

