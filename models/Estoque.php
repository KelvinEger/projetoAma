<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "estoque".
 *
 * @property int $esto_codigo Código do estoque
 * @property float|null $esto_quantidade Quantidade
 */
class Estoque extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'estoque';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['esto_codigo'], 'required'],
            [['esto_quantidade'], 'number'],
            [['esto_codigo'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'esto_codigo' => 'Esto Codigo',
            'esto_quantidade' => 'Quantidade',
        ];
    }
}
