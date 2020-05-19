<?php

namespace app\models;

use yii\data\ActiveDataProvider;
use yii\base\Model;

class EntradaConsulta extends \app\models\Entrada {

	public $entr_tipo_descricao;

	public function rules() {
		return [
			[['entr_data'], 'date'],
			[['entr_sequencial', 'entr_valor_total', 'entr_tipo_codigo'], 'integer'],
			[['entr_tipo_descricao'], 'string']
		];
	}

	public function search($param) {
		$query = Entrada::find();
		$query->join('LEFT JOIN', 'entr_tipo', 'entr_tipo.entr_tipo_codigo = entrada.entr_tipo_codigo');
		$query->addSelect('entr_tipo_descricao, entrada.*');

		$dataProvider = new ActiveDataProvider([
			'query' => $query,
		]);

		$this->load($param);

		if(!$this->validate()) {
			return $dataProvider;
		}

		return $dataProvider;
	}

}
