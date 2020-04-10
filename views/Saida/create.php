<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Tabs;

/**
 * @var $model Produto
 */

echo Html::jsFile('@web/js/tratamentos_saida.js');

$this->title = 'Saída';
$this->params['breadcrumbs'][] = ['label' => 'Saídas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="saida-create">
	<div class="container row">

		<?php
		$form = ActiveForm::begin(['method' => 'post']);
		
		echo '<br>';
		echo Tabs::widget([
			'items' => [
				[
					'label' => 'Informações da saída',
					'content' => $this->render('informacoes_saida.php', ['form' => $form
																						   ]),
					'active' => true
				],
				[
					'label' => 'Produtos da saída',
					'content' => $this->render('produtos.php', ['form'  => $form, 
																			  'model' => $model
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
