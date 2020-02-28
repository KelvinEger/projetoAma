<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Categoria */

$this->title = 'Cadastrar Categoria';
$this->params['breadcrumbs'][] = ['label' => 'Categorias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categoria-create">

<?php
	$form = ActiveForm::begin(
			  ['method' => 'post']
			  );

	echo $form->field($model, 'cate_descricao');
	echo Html::submitButton('Cadastrar', ['class' => 'btn btn-success']);
	echo '&nbsp';
	echo Html::a('Cancelar', ['/categoria'], ['class' => 'btn btn-primary']);
	
	ActiveForm::end();
?>

</div>
