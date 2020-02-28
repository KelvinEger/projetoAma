<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Categoria;

/* @var $this yii\web\View */
/* @var $model app\models\Produto */

$this->title = 'Cadastrar Produto';
$this->params['breadcrumbs'][] = ['label' => 'Produtos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="produto-create">
	<?php
	$form = ActiveForm::begin([
				  'method' => 'post'
	]);

	$oCategoria = new Categoria();

	$aArrayAux = ArrayHelper::map($oCategoria::find()->all(), 'cate_codigo', 'cate_descricao');
	array_unshift($aArrayAux, 'Selecione');

	echo $form->field($model, 'prod_descricao');
	echo $form->field($model, 'prod_quantidade_ideal')->textInput(['type' => 'number', 'min' => 0]);
	echo $form->field($model, 'prod_quantidade_minima')->textInput(['type' => 'number', 'min' => 0]);
	echo $form->field($model, 'cate_codigo')->dropDownList($aArrayAux);
	echo $form->field($model, 'situacao')->dropDownList(
			  [
				  1 => 'Ativo',
				  2 => 'Inativo'
	]);

	echo Html::submitButton('Cadastrar', ['class' => 'btn btn-success']);
	echo '&nbsp';
	echo Html::a('Cancelar', ['index'], ['class' => 'btn btn-primary']);

	ActiveForm::end();
	?>

	<div class="form-group">
	</div>
</div>
