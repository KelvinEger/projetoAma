<?php 
use yii\helpers\Html;

/* @var $oEntrada app\models\Entrada */

echo $form->field($oEntrada, 'entr_tipo_codigo')->dropDownList($oEntrada::TIPO_ENTRADA);
echo $form->field($oEntrada, 'entr_data')->input('date');
echo $form->field($oEntrada, 'entr_valor_total');
echo $form->field($oEntrada, 'entr_observacao');


