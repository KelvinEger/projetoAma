<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Categoria */

$this->title = 'Visualizar Categoria';
$this->params['breadcrumbs'][] = ['label' => 'Categorias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->cate_descricao;

\yii\web\YiiAsset::register($this);
?>

<h3><?= Html::encode($model->cate_descricao) ?></h3>
<?=
	DetailView::widget([
		'model' => $model,
		'attributes' => [
			'cate_codigo',
			'cate_descricao',
		],
	])
	?>
<div class="categoria-view">
	<?= Html::a('Editar', ['update', 'id' => $model->cate_codigo], ['class' => 'btn btn-primary']) ?>
	<?=
	Html::a('Excluir', ['delete', 'id' => $model->cate_codigo], [
		'class' => 'btn btn-danger',
		'data' => [
			'confirm' => 'Confirma exclusão?',
			'method' => 'post',
		],
	])
	?>
	<?= Html::a('Voltar', ['index'], ['class' => 'btn btn-light']) ?>
</div>
