<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProdutoConsulta */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="produto-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'prod_codigo') ?>

    <?= $form->field($model, 'cate_codigo') ?>

    <?= $form->field($model, 'prod_descricao') ?>

    <?= $form->field($model, 'situacao') ?>

    <?= $form->field($model, 'prod_quantidade_ideal') ?>

    <?php // echo $form->field($model, 'prod_quantidade_minima') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
