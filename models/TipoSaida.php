<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipo_saida".
 *
 * @property int $tipo_said_codigo Código do tipo de saída
 * @property string|null $tipo_said_descricao Descrição do tipo de saída
 */
class TipoSaida extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tipo_saida';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tipo_said_codigo'], 'required'],
            [['tipo_said_codigo'], 'integer'],
            [['tipo_said_descricao'], 'string', 'max' => 50],
            [['tipo_said_codigo'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'tipo_said_codigo' => 'Tipo Said Codigo',
            'tipo_said_descricao' => 'Tipo Said Descricao',
        ];
    }
}
