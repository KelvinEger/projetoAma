<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * Classe Model da tabela "lote".
 *
 * @property int $lote_sequencial Sequencial do cadastro de lote
 * @property string|null $lote_validade Data de validade do lote
 * @property string|null $lote_descricao descrição do Lote
 */
class Lote extends ActiveRecord {

	/**
	 * {@inheritdoc}
	 */
	public static function tableName() {
		return 'lote';
	}

	/**
	 * {@inheritdoc}
	 */
	public function rules() {
		return [
			[['lote_sequencial', 'lote_validade', 'lote_descricao'], 'required', 'message' => 'Campo obrigatório'],
			[['lote_sequencial'], 'integer'],
			[['lote_validade'], 'date'],
			[['lote_descricao'], 'string', 'max' => 15],
			[['lote_sequencial'], 'unique']
		];
	}

	/**
	 * {@inheritdoc}
	 */
	public function attributeLabels() {
		return [
			'lote_sequencial' => 'Código do Lote',
			'lote_validade'   => 'Validade',
			'lote_descricao'  => 'Lote'
		];
	}

}
