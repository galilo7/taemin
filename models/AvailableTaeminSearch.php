<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\appmodels\AppAvailableTaemin;

/**
 * AvailableTaeminSearch represents the model behind the search form about `app\models\appmodels\AppAvailableTaemin`.
 */
class AvailableTaeminSearch extends AppAvailableTaemin
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'r_company', 'cost', 'price'], 'integer'],
            [['name', 'description', 'price_description', 'type', 'created_at', 'updated_at'], 'safe'],
            [['percentage'], 'number'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = AppAvailableTaemin::find();

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
            'id' => $this->id,
            'r_company' => $this->r_company,
            'cost' => $this->cost,
            'price' => $this->price,
            'percentage' => $this->percentage,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'price_description', $this->price_description])
            ->andFilterWhere(['like', 'type', $this->type]);

        return $dataProvider;
    }
}
