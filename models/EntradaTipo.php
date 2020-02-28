<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "entr_tipo".
 *
 * @property int $entr_tipo_codigo Código do tipo de entrada
 * @property string|null $entr_tipo_descricao Descrição do tipo de entrada
 */
class EntradaTipo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'entr_tipo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['entr_tipo_codigo'], 'required'],
            [['entr_tipo_codigo'], 'integer'],
            [['entr_tipo_descricao'], 'string', 'max' => 50],
            [['entr_tipo_codigo'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'entr_tipo_codigo' => 'Entr Tipo Codigo',
            'entr_tipo_descricao' => 'Entr Tipo Descricao',
        ];
    }
}
