<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Categoria;
use app\models\Produto;

/* @var $this yii\web\View */
/* @var $model app\models\Produto */
$this->title = 'Atualizar Produto: '.$model->prod_descricao;
$this->params['breadcrumbs'][] = ['label'=>'Produtos', 'url'=>['index']];
$this->params['breadcrumbs'][] = ['label'=>$model->prod_descricao, 'url'=>['view', 'id'=>$model->prod_codigo]];
$this->params['breadcrumbs'][] = 'Update';
?>

<div class="produto-update">

	<?php
	$form = ActiveForm::begin([
			'method'=>'post'
	]);

	$oCategoria = new Categoria();
	$oCategoria->cate_codigo = $model->cate_codigo;

	echo $form->field($model, 'prod_descricao');
	echo $form->field($model, 'cate_codigo')->dropDownList(
		ArrayHelper::map($oCategoria::find()->all(), 'cate_codigo', 'cate_descricao')
	);

	echo $form->field($model, 'situacao')->dropDownList(Produto::NOME_SITUACAO);
	echo $form->field($model, 'prod_quantidade_ideal');
	echo $form->field($model, 'prod_quantidade_minima');

	echo Html::submitButton('Atualizar', ['class'=>'btn btn-success']);
	echo '&nbsp';
	echo Html::a('Cancelar', ['index'], ['class'=>'btn btn-primary']);
	
	ActiveForm::end();
	?>

</div>
