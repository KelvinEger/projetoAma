<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Categoria */

$this->title = 'Atualizar Categoria: '.$model->cate_descricao;
$this->params['breadcrumbs'][] = ['label'=>'Categorias', 'url'=>['index']];
$this->params['breadcrumbs'][] = ['label'=>$model->cate_descricao, 'url'=>['view', 'id'=>$model->cate_codigo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="categoria-update">

	<?php
	$form = ActiveForm::begin(
			['method'=>'post']
	);

	echo $form->field($model, 'cate_descricao');
	echo Html::submitButton('Atualizar', ['class'=>'btn btn-success']);
	echo '&nbsp';
	echo Html::a('Cancelar', ['index'], ['class'=>'btn btn-primary']);

	ActiveForm::end();
	?>

</div>
