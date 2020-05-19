<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Categoria;

/**
 * CategoriaConsulta represents the model behind the search form of `app\models\Categoria`.
 */
class CategoriaConsulta extends Categoria {

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['cate_codigo'], 'integer'],
            [['cate_descricao'], 'date'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios() {
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
    public function search($params) {
        $query = Categoria::find();

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
            'cate_codigo' => $this->cate_codigo,
        ]);

        $query->andFilterWhere(['like', 'cate_descricao', $this->cate_descricao]);

        return $dataProvider;
    }

}
