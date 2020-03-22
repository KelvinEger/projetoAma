<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\data\SqlDataProvider;
use yii\base\Model;

/**
 * Classe Model da tabela "entrada_produto".
 *
 * @property int $entr_prod_sequencial Sequencial dos produtos da entrada
 * @property int|null $prod_codigo Cadastro de produto
 * @property float|null $entr_prod_quantidade Quantidade do item
 * @property int|null $entr_sequencial Sequencial das entradas
 * @property int|null $lote_sequencial Sequencial do cadastro de lote
 */
class EntradaProduto extends ActiveRecord {

	/**
	 * {@inheritdoc}
	 */
	public static function tableName() {
		return 'entrada_produto';
	}

	/**
	 * {@inheritdoc}
	 */
	public function rules() {
		return [
			[['entr_prod_sequencial', 'prod_codigo', 'entr_sequencial', 'lote_sequencial', 'entr_prod_quantidade'], 'required', 'message' => 'Campo Obrigatório'],
			[['entr_prod_sequencial', 'prod_codigo', 'entr_sequencial', 'lote_sequencial'], 'integer'],
			[['entr_prod_quantidade'], 'number', 'message' => 'O campo deve ser um número válido'],
			[['entr_prod_sequencial'], 'unique']
		];
	}

	/**
	 * {@inheritdoc}
	 */
	public function attributeLabels() {
		return [
			'entr_prod_sequencial' => 'Código do produto na entrada',
			'prod_codigo'          => 'Produto',
			'entr_prod_quantidade' => 'Quantidade',
			'entr_sequencial'      => 'Código Entrada',
			'lote_sequencial'      => 'Lote'
		];
	}

	/**
	 * Cria a variável 'DataProvider' usada nos grids
	 * @param array $params
	 * @return ActiveDataProvider
	 */
	public function search($params) {
		$query = EntradaProduto::find();
		
		$dataProvider = new SqlDataProvider([ 'sql' => $this->getSqlGriEntradadProdutos()]);
		
		$this->load($params);

		if(!$this->validate()) {
			return $dataProvider;
		}

		// Condições de filtro do grid
		$query->andFilterWhere([
			'prod_codigo'          => $this->prod_codigo,
			'entr_prod_quantidade' => $this->entr_prod_quantidade,
			'entr_sequencial'      => $this->entr_sequencial,
			'entr_sequencial'      => $this->entr_sequencial,
			'lote_sequencial'      => $this->lote_sequencial,
		]);

		$query->andFilterWhere(['like', 'prod_codigo', $this->prod_codigo]);

		return $dataProvider;
	}

	/**
	 * {@inheritdoc}
	 */
	public function scenarios() {
		return Model::scenarios();
	}
	
	/**
	 * Retorna SQL utilizado para montar o grid de produtos da entrada
	 * @return string
	 */
	private function getSqlGriEntradadProdutos(){
		return " SELECT entrada.entr_sequencial,
							 entrada_produto.prod_codigo,
							 produto.prod_descricao,
							 lote.lote_descricao,
							 lote.lote_validade,
							 entrada_produto.entr_prod_quantidade
					  FROM entrada 
					  JOIN entrada_produto
					    ON entrada_produto.entr_sequencial = entrada.entr_sequencial
					  JOIN lote 
					    ON lote.lote_sequencial = entrada_produto.lote_sequencial
					  JOIN produto
					    ON produto.prod_codigo = entrada_produto.prod_codigo";
	}

}
