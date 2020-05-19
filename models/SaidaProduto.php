<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "saida_produto".
 *
 * @property int $said_prod_sequencial Sequencial do produto
 * @property float|null $said_prod_quantidade Quantidade de itens saída
 * @property int|null $prod_codigo Cadastro de produto
 * @property int|null $said_sequencial Sequencial das saidas
 */
class SaidaProduto extends ActiveRecord {

	/**
	 * {@inheritdoc}
	 */
	public static function tableName() {
		return 'saida_produto';
	}

	/**
	 * {@inheritdoc}
	 */
	public function rules() {
		return [
			[['said_prod_sequencial'], 'required'],
			[['said_prod_sequencial', 'prod_codigo', 'said_sequencial'], 'integer'],
			[['said_prod_quantidade'], 'number'],
			[['said_prod_sequencial'], 'unique'],
		];
	}

	/**
	 * {@inheritdoc}
	 */
	public function attributeLabels() {
		return [
			'said_prod_sequencial'=>'Said Prod Sequencial',
			'said_prod_quantidade'=>'Quantidade',
			'prod_codigo'=>'Prod Codigo',
			'said_sequencial'=>'Said Sequencial',
		];
	}

}
