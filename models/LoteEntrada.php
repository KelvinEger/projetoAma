<?php

namespace app\models;
use app\models\Lotes;

class LoteEntrada extends Lote{
	
	public function rules() {
		return [
			[['lote_sequencial'], 'integer'],
			[['lote_validade'], 'safe'],
			[['lote_descricao'], 'string', 'max' => 15],
			[['lote_sequencial'], 'unique']
		];
	}
}