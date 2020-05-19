<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "saida".
 *
 * @property int $said_sequencial Sequencial das saidas
 * @property string|null $said_data Data da saída
 * @property int|null $tipo_said_codigo Código do tipo de saída
 * @property string|null $said_observacao Observação
 */
class Saida extends ActiveRecord {

	const TIPO_SAIDA = [1 => 'Uso', 
							  2 => 'Quebra', 
							  3 => 'Ajuste'];	
	
	/**
	 * {@inheritdoc}
	 */
	public static function tableName() {
		return 'saida';
	}

	/**
	 * {@inheritdoc}
	 */
	public function rules() {
		return [
			[['said_sequencial'], 'required'],
			[['said_sequencial', 'tipo_said_codigo'], 'integer'],
			[['said_data'], 'safe'],
			[['said_observacao'], 'string', 'max'=>500],
			[['said_sequencial'], 'unique'],
		];
	}

	/**
	 * {@inheritdoc}
	 */
	public function attributeLabels() {
		return [
			'said_sequencial'  => 'Código da saída',
			'said_data'        => 'Data',
			'tipo_said_codigo' => 'Tipo da saída',
			'said_observacao'  => 'Observação',
		];
	}

}
