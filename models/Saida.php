<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "saida".
 *
 * @property int $said_sequencial Sequencial das saidas
 * @property string|null $said_data Data da saída
 * @property int|null $tipo_said_codigo Código do tipo de saída
 * @property string|null $said_observacao Observação
 */
class Saida extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'saida';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['said_sequencial'], 'required'],
            [['said_sequencial', 'tipo_said_codigo'], 'integer'],
            [['said_data'], 'safe'],
            [['said_observacao'], 'string', 'max' => 500],
            [['said_sequencial'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'said_sequencial' => 'Said Sequencial',
            'said_data' => 'Said Data',
            'tipo_said_codigo' => 'Tipo Said Codigo',
            'said_observacao' => 'Said Observacao',
        ];
    }
}
