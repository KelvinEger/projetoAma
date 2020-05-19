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
		<?= Html::a('Cadastrar', ['create'], ['class' => 'btn btn-success']) ?>
	</p>

	<?=
	
	GridView::widget([
		'dataProvider' => $dataProvider,
		'filterModel' => $searchModel,
		'columns' => [
            ['attribute' => 'entr_sequencial',
                'headerOptions' => ['style' => 'width:5%;']
            ],
				['attribute' => 'entr_tipo_descricao',
                'headerOptions' => ['style' => 'width:5%;']
            ],
            ['attribute' => 'entr_data',
                'headerOptions' => ['style' => 'width:10%;']
            ],
            ['attribute' => 'entr_valor_total',
                'headerOptions' => ['style' => 'width:5%;']
            ],
            ['class' => 'yii\grid\ActionColumn',  
				'headerOptions' => ['style' => 'width:8%']],
			]
	]);
	?>

</div>
