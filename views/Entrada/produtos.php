<?php

use yii\jui\AutoComplete;

//echo $form->field($oEntradaProduto, 'prod_codigo');
echo $form->field($oEntradaProduto, 'entr_prod_quantidade');
echo $form->field($oEntradaProduto, 'entr_sequencial');
echo $form->field($oEntradaProduto, 'lote_sequencial');
echo $form->field($oEntradaProduto, 'esto_codigo');

echo $form->field($oEntradaProduto, 'prod_codigo')->widget(AutoComplete::classname(), [
    'clientOptions' => [
        'source' => ['USA', 'RUS'],
    ],
]);


