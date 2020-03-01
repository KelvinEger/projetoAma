<?php

namespace app\models;

use yii\db\ActiveRecord;
use Yii;

/**
 * This is the model class for table "produto".
 *
 * @property int $prod_codigo Cadastro de produto
 * @property int|null $cate_codigo Código do cadastro da categoria
 * @property string|null $prod_descricao Nome do produto
 * @property int|null $situacao Situação do produto. 1- Ativo 2- Inativo.
 * @property int|null $prod_quantidade_ideal Quantidade ideal para o estoque
 * @property int|null $prod_quantidade_minima Quantidade mínima esperada do estoque.
 * @property Categoria[] $categorias Categorias de produtos
 */
class Produto extends ActiveRecord {
	
	CONST NOME_SITUACAO = ['' => 'Selecione', 1 => 'Ativo', 2=> 'Inativo'];
	
	/**
	 * {@inheritdoc}
	 */
	public static function tableName() {
		return 'produto';
	}

	/**
	 * {@inheritdoc}
	 */
	public function rules() {
		return [
			 [['prod_codigo', 'prod_descricao', 'situacao', 'prod_quantidade_ideal', 'prod_quantidade_minima'], 'required', 'message' => 'Campo obrigatório'],
			 [['prod_codigo', 'cate_codigo', 'situacao', 'prod_quantidade_ideal', 'prod_quantidade_minima'], 'integer'],
			 [['prod_descricao'], 'string', 'max' => 40],
			 [['prod_codigo'], 'unique'],
			 [['cate_codigo'], 'compare', 'compareValue' => '0', 'operator' => '!==', 'message' => 'Campo obrigatório']
		];
	}

	/**
	 * {@inheritdoc}
	 */
	public function attributeLabels() {
		return [
			 'prod_codigo'            => 'Produto',
			 'cate_codigo'            => 'Categoria',
			 'prod_descricao'         => 'Nome do Produto',
			 'situacao'               => 'Situacao',
			 'prod_quantidade_ideal'  => 'Quantidade Ideal',
			 'prod_quantidade_minima' => 'Quantidade Mínima',
		];
	}

	/**
	 *  Retorna as categorias para os produtos
	 */
	public function getCategorias() {
		return $this->hasMany(Categoria::class, ['cate_codigo' => 'cate_codigo']);
	}
	
	/**
	 * Formata o array para ser utilizado no Widget 'AutoComplete'
	 * @param array $aCondicao
	 * @return array
	 */
	public function getProdutosOrganizados($aCondicao = []) {
		$aProdutos = parent::findAll($aCondicao);
		$aRetorno  = array();

		foreach($aProdutos as $obj) {
			$aRetorno[] = $obj->prod_descricao;
		}
		
		return $aRetorno;
	}
	
}
