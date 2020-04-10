<?php 
use yii\helpers\Html;
use app\models\Saida;

/** @var $oEntrada app\models\Saida */
$oSaida = new Saida();

echo $form->field($oSaida, 'tipo_said_codigo')->dropDownList($oSaida::TIPO_SAIDA);
echo $form->field($oSaida, 'said_data')->input('date');
echo $form->field($oSaida, 'said_observacao');


