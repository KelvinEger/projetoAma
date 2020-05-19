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

    <?php
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['attribute' => 'prod_codigo',
                'headerOptions' => ['style' => 'width:5%;']
            ],
            ['attribute' => 'prod_descricao',
                'headerOptions' => ['style' => 'width:35%;']
            ],
            ['attribute' => 'cate_codigo',
                'value' => function($oProduto) {
                    return ($oProduto->cate_codigo != 0) ? Categoria::findOne($oProduto->cate_codigo)->cate_descricao : 'Não definida'; // retirar quando tratar a questão de não permitir vategorias diferentes de zero
                },
                'headerOptions' => ['style' => 'width:15%;']
            ],
            ['attribute' => 'situacao',
                'value' => function($oProduto) {
                    return app\models\Produto::NOME_SITUACAO[$oProduto->situacao];
                },
                'headerOptions' => ['style' => 'width:10%;']
            ],
            ['attribute' => 'prod_quantidade_ideal',
                'headerOptions' => ['style' => 'width:10%;']
            ],
            ['attribute' => 'prod_quantidade_minima',
                'headerOptions' => ['style' => 'width:10%;']
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>

</div>
