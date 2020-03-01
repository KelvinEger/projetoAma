<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\data\ActiveDataProvider;
use yii\base\Model;

/**
 * Classe Model da tabela "entrada_produto".
 *
 * @property int $entr_prod_sequencial Sequencial dos produtos da entrada
 * @property int|null $prod_codigo Cadastro de produto
 * @property float|null $entr_prod_quantidade Quantidade do item
 * @property int|null $entr_sequencial Sequencial das entradas
 * @property int|null $lote_sequencial Sequencial do cadastro de lote
 * @property int|null $esto_codigo Código do estoque
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
			[['entr_prod_sequencial', 'prod_codigo', 'entr_sequencial', 'lote_sequencial', 'esto_codigo', 'entr_prod_quantidade'], 'required', 'message' => 'Campo Obrigatório'],
			[['entr_prod_sequencial', 'prod_codigo', 'entr_sequencial', 'lote_sequencial', 'esto_codigo'], 'integer'],
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

		$dataProvider = new ActiveDataProvider([
			'query'=>$query,
		]);

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

}
