<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Categoria;

/* @var $this yii\web\View */
/* @var $model app\models\Produto */
/* @var $oCategoria app\models\Categoria */

$this->title = 'Cadastro Produto';
$this->params['breadcrumbs'][] = ['label' => 'Produtos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->prod_descricao;
\yii\web\YiiAsset::register($this);
?>
<div class="produto-view">

	<h3><?= Html::encode($this->title) ?></h3>	

	<?php
	$oCategoria = new Categoria();

	echo DetailView::widget([
		'model' => $model,
		'attributes' => [
			[
				'attribute' => 'prod_descricao',
				'value' => $model->prod_descricao,
			],
			[
				'attribute' => 'cate_codigo',
				'value' => $oCategoria::findOne($model->cate_codigo)['cate_descricao'],
			],
			[
				'attribute' => 'situacao',
				'value' => $model::NOME_SITUACAO[$model->situacao]
			],
			[
				'attribute' => 'prod_quantidade_minima',
				'value' => $model->prod_quantidade_minima
			],
			[
				'attribute' => 'prod_quantidade_minima',
				'value' => $model->prod_quantidade_minima
			]
		],
	])
	?>

</div>
<p>
	<?= Html::a('Atualizar', ['update', 'id' => $model->prod_codigo], ['class' => 'btn btn-primary']) ?>
	<?=
	Html::a('Excluir', ['delete', 'id' => $model->prod_codigo], [
		'class' => 'btn btn-danger',
		'data' => [
			'confirm' => 'Confirma exclusão deste produto?',
			'method' => 'post',
		],
	])
	?>
	<?= Html::a('Voltar', ['/produto'], ['class' => 'btn btn-primary']) ?>
</p>
