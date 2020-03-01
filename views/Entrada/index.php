<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Categoria;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProdutoConsulta */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Produtos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="produto-index">
	<p>
		<?= Html::a('Cadastrar', ['create'], ['class'=>'btn btn-success']) ?>
	</p>

	<?php
	echo GridView::widget([
		'dataProvider'=>$dataProvider,
		'columns'=>[
			'id',
			'name',
			'created_at:datetime',
		// ...
		],
	]);
	?>

</div>
