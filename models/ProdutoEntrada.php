<?php

namespace app\models;

use app\models\Produto;

/**
 * Extende a classe de produto pra sobrescrever o método Rules(). 
 * É necessário que seja sobrescrito uma vez que as regras do cadastro de produto e do produto na entrada são diferentes.
 */
class ProdutoEntrada extends Produto {
		
	public function rules() {
		return [
//			 [['prod_codigo', 'prod_descricao', 'situacao', 'prod_quantidade_ideal', 'prod_quantidade_minima'], 'required', 'message' => 'Campo obrigatório'],
			 [['prod_codigo', 'cate_codigo', 'situacao', 'prod_quantidade_ideal', 'prod_quantidade_minima'], 'integer'],
			 [['prod_descricao'], 'string', 'max' => 40],
			 [['prod_codigo'], 'unique'],
			 [['cate_codigo'], 'compare', 'compareValue' => '0', 'operator' => '!==', 'message' => 'Campo obrigatório']
		];
	}
	
		
}