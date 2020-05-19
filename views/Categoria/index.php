<?php

use yii\helpers\Html;
use yii\grid\GridView;
use lo\modules\noty\Wrapper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CategoriaConsulta */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Categorias';
$this->params['breadcrumbs'][] = $this->title;

echo Html::jsFile('@web/js/toasts.js');
echo Wrapper::widget([
	'layerClass' => 'lo\modules\noty\layers\JqueryToastPlugin',
]);

if(!empty($acao)) {
	$this->registerJs("alertaSucesso('Registro $acao com sucesso.');");
}

?>
<div class="categoria-index">
	<p>
		<?= Html::a('Cadastrar', ['create'], ['class' => 'btn btn-success']) ?>
	</p>

	<?=
	GridView::widget([
		'dataProvider' => $dataProvider,
		'filterModel' => $searchModel,
		'columns' => [
			['attribute' => 'cate_codigo',
				'headerOptions' => ['style' => 'width:5%;']
			],
			['attribute' => 'cate_descricao',
				'headerOptions' => ['style' => 'width:85%']
			],
			['class' => 'yii\grid\ActionColumn',
				'headerOptions' => ['style' => 'width:8%']],
		],
	]);
	?>
</div>
