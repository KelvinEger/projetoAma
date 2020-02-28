<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="categoria-form">

    <?php $form = ActiveForm::begin();

     echo Html::label('Descrição');
	  echo Html::input('text', 'descricao', '', ['placeholder' => 'Descrição', 'class' => 'form-control', 'label' => 'nome']);
		?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
