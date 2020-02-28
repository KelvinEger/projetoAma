<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "entrada_produto".
 *
 * @property int $entr_prod_sequencial Sequencial dos produtos da entrada
 * @property int|null $prod_codigo Cadastro de produto
 * @property float|null $entr_prod_quantidade Quantidade do item
 * @property int|null $entr_sequencial Sequencial das entradas
 * @property int|null $lote_sequencial Sequencial do cadastro de lote
 * @property int|null $esto_codigo Código do estoque
 */
class EntradaProduto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'entrada_produto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['entr_prod_sequencial'], 'required'],
            [['entr_prod_sequencial', 'prod_codigo', 'entr_sequencial', 'lote_sequencial', 'esto_codigo'], 'integer'],
            [['entr_prod_quantidade'], 'number'],
            [['entr_prod_sequencial'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'entr_prod_sequencial' => 'Entr Prod Sequencial',
            'prod_codigo' => 'Prod Codigo',
            'entr_prod_quantidade' => 'Entr Prod Quantidade',
            'entr_sequencial' => 'Entr Sequencial',
            'lote_sequencial' => 'Lote Sequencial',
            'esto_codigo' => 'Esto Codigo',
        ];
    }
}
