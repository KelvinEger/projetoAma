<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Tabs;

/** 
 * @var $this yii\web\View 
 * @var $model app\models\Entrada 
 * @var $searchModel app\models\EntradaProduto
 * @var $dataprovider search of app\models\EntradaProduto
 */

echo Html::jsFile('@web/js/tratamentos_entrada.js');

$this->title = 'Entrada';
$this->params['breadcrumbs'][] = ['label' => 'Entradas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="entrada-create">
	<div class="container row">

		<?php
		$form = ActiveForm::begin(['method' => 'post']);
		
		echo '<br>';
		echo Tabs::widget([
			'items' => [
				[
					'label' => 'Informações da entrada',
					'content' => $this->render('informacoes_entrada.php', ['form' => $form
																						   ]),
					'active' => true
				],
				[
					'label' => 'Produtos da entrada',
					'content' => $this->render('produtos.php', ['form'         => $form, 
																			  'dataProvider' => $dataProvider,
																			  'searchModel'  => $searchModel
																			 ]),
				],
		]]);
		?>

	</div>
	<div class="container row">
		<?php
		echo Html::submitButton('Cadastrar', ['class' => 'btn btn-success', 'onclick' => 'validaSubmit();']);
		echo '&nbsp';
		echo Html::a('Cancelar', ['/categoria'], ['class' => 'btn btn-primary']);
		echo '</div>';
		ActiveForm::end();
		?>

	</div>
</div>
