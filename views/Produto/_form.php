<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Produto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="produto-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'prod_codigo')->textInput() ?>

    <?= $form->field($model, 'cate_codigo')->textInput() ?>

    <?= $form->field($model, 'prod_descricao')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'situacao')->textInput() ?>

    <?= $form->field($model, 'prod_quantidade_ideal')->textInput() ?>

    <?= $form->field($model, 'prod_quantidade_minima')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
