<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "produto_estoque".
 *
 * @property int $esto_codigo Código do estoque
 * @property int $prod_codigo Cadastro de produto
 */
class ProdutoEstoque extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'produto_estoque';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['esto_codigo', 'prod_codigo'], 'required'],
            [['esto_codigo', 'prod_codigo'], 'integer'],
            [['esto_codigo', 'prod_codigo'], 'unique', 'targetAttribute' => ['esto_codigo', 'prod_codigo']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'esto_codigo' => 'Esto Codigo',
            'prod_codigo' => 'Prod Codigo',
        ];
    }
}
