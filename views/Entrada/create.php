<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Tabs;
use app\models\Entrada;
use app\models\EntradaProduto;

/* @var $this yii\web\View */
/* @var $model app\models\Entrada */

$this->title = 'Entrada';
$this->params['breadcrumbs'][] = ['label' => 'Entradas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="entrada-create">
	<div class="container row">

		<?php
		$form     = ActiveForm::begin(['method' => 'post']);
		$oEntrada = new Entrada();
		
		echo '<br>';
		echo Tabs::widget([
			'items' => [
				[
					'label' => 'Informações da entrada',
					'content' => $this->render('informacoes_entrada.php', ['form'     => $form, 
																							 'oEntrada' => $oEntrada
																						   ]),
					'active' => true
				],
				[
					'label' => 'Produtos da entrada',
					'content' => $this->render('produtos.php', ['form'            => $form, 
																			  'dataProvider'    => $dataProvider,
																			  'searchModel'     => $searchModel
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
