<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CategoriaConsulta */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Categorias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categoria-index">
    <p>
        <?= Html::a('Cadastrar', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [ 'attribute' => 'cate_codigo',
				  'headerOptions' => ['style' => 'width:5%;']
				],
				[ 'attribute' => 'cate_descricao',
				  'headerOptions' => ['style' => 'width:85%']
				],
				['class' => 'yii\grid\ActionColumn',  
				'headerOptions' => ['style' => 'width:8%']],
        ],
    ]);
		?>
</div>
