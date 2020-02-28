<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Produto;

/**
 * ProdutoConsulta represents the model behind the search form of `app\models\Produto`.
 */
class ProdutoConsulta extends Produto
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['prod_codigo', 'cate_codigo', 'situacao', 'prod_quantidade_ideal', 'prod_quantidade_minima'], 'integer'],
            [['prod_descricao'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Produto::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'prod_codigo' => $this->prod_codigo,
            'cate_codigo' => $this->cate_codigo,
            'situacao' => $this->situacao,
            'prod_quantidade_ideal' => $this->prod_quantidade_ideal,
            'prod_quantidade_minima' => $this->prod_quantidade_minima,
        ]);

        $query->andFilterWhere(['like', 'prod_descricao', $this->prod_descricao]);

        return $dataProvider;
    }
}
