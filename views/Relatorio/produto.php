<?php

use app\models\Categoria;
use app\models\Produto;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

$this->params['breadcrumbs'][] = ['label' => 'Relatórios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="body-content">
	<fieldset>
		<legend>Produtos Cadastrados</legend>
		<legend><h5>Filtros</h5></legend>
		<div class="col-lg-12 card">
			<div class="col-lg-3">
				<?php
				echo Html::label('Filtro');
				echo Html::dropDownList('filtros', '', ['' => 'Selecione',
					'1' => 'Igual a',
					'2' => 'Contém',
					'3' => 'Inicia com',
					'4' => 'Termina com'], ['class' => 'form-control'])
				?>
			</div>
			<div class="col-lg-9">
				<?php
				echo Html::label('Descrição');
				echo Html::input('text', 'descricao', '', ['placeholder' => 'Descrição', 'class' => 'form-control', 'label' => 'nome']);
				?>
			</div>
			<div class="col-lg-12">
				<?php
				$form = ActiveForm::begin();
				$oCategoria = new Categoria();
				$oProduto = new Produto();

				$aArrayAux = ArrayHelper::map($oCategoria::find()->all(), 'cate_codigo', 'cate_descricao');
				array_unshift($aArrayAux, 'Selecione');
				echo $form->field($oCategoria, 'cate_codigo')->dropDownList($aArrayAux);
				?>
			</div>
			<div class="col-lg-6">
				<?= Html::label('Código inicial') ?>
				<?= Html::input('number', 'valor_inicial', '', ['class' => 'form-control', 'label' => 'nome', 'min' => 0]) ?>
			</div>
			<div class="col-lg-6">
				<?= Html::label('Código final') ?>
				<?= Html::input('number', 'valor_inicial', '', ['class' => 'form-control', 'label' => 'nome', 'min' => 0]) ?>
			</div>
		</div>
		<div>
			<?php
				$form = ActiveForm::end();

				echo Html::submitButton('Download', ['class' => 'btn btn-primary']);
			?>
		</div>
	</fieldset>
</div>
