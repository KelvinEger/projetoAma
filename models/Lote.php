<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lote".
 *
 * @property int $lote_sequencial Sequencial do cadastro de lote
 * @property string|null $lote_validade Data de validade do lote
 * @property string|null $lote_descricao descrição do Lote
 */
class Lote extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lote';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lote_sequencial'], 'required'],
            [['lote_sequencial'], 'integer'],
            [['lote_validade'], 'safe'],
            [['lote_descricao'], 'string', 'max' => 15],
            [['lote_sequencial'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'lote_sequencial' => 'Lote Sequencial',
            'lote_validade' => 'Lote Validade',
            'lote_descricao' => 'Lote Descricao',
        ];
    }
}
