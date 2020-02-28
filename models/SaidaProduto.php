<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "saida_produto".
 *
 * @property int $said_prod_sequencial Sequencial do produto
 * @property float|null $said_prod_quantidade Quantidade de itens saídos
 * @property int|null $lote_sequencial Sequencial do cadastro de lote
 * @property int|null $prod_codigo Cadastro de produto
 * @property int|null $said_sequencial Sequencial das saidas
 * @property int|null $esto_codigo Código do estoque
 */
class SaidaProduto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'saida_produto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['said_prod_sequencial'], 'required'],
            [['said_prod_sequencial', 'lote_sequencial', 'prod_codigo', 'said_sequencial', 'esto_codigo'], 'integer'],
            [['said_prod_quantidade'], 'number'],
            [['said_prod_sequencial'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'said_prod_sequencial' => 'Said Prod Sequencial',
            'said_prod_quantidade' => 'Said Prod Quantidade',
            'lote_sequencial' => 'Lote Sequencial',
            'prod_codigo' => 'Prod Codigo',
            'said_sequencial' => 'Said Sequencial',
            'esto_codigo' => 'Esto Codigo',
        ];
    }
}
