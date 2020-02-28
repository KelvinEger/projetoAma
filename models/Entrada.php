<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "entrada".
 *
 * @property int $entr_sequencial Sequencial das entradas
 * @property string|null $entr_data Data da entrada
 * @property float|null $entr_valor_total Valor total dos itens da entrada
 * @property int|null $entr_tipo_codigo Código do tipo de entrada
 * @property string|null $entr_observacao Observação
 */
class Entrada extends ActiveRecord {
	
	const TIPO_ENTRADA = [1 => 'Compra', 2 => 'Doação', 3 => 'Produção Própria'];

	/**
	 * {@inheritdoc}
	 */
	public static function tableName() {
		return 'entrada';
	}

	/**
	 * {@inheritdoc}
	 */
	public function rules() {
		return [
			[['entr_sequencial'], 'required'],
			[['entr_sequencial', 'entr_tipo_codigo'], 'integer'],
			[['entr_data'], 'safe'],
			[['entr_valor_total'], 'number'],
			[['entr_observacao'], 'string', 'max'=>500],
			[['entr_sequencial'], 'unique'],
		];
	}

	/**
	 * {@inheritdoc}
	 */
	public function attributeLabels() {
		return [
			'entr_sequencial'  => 'Entrada',
			'entr_data'        => 'Data',
			'entr_valor_total' => 'Valor Total',
			'entr_tipo_codigo' => 'Tipo',
			'entr_observacao'  => 'Observação',
		];
	}

}
