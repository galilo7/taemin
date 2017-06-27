<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\appmodels\AppCompanies;

/**
 * CompaniesSearch represents the model behind the search form about `app\models\appmodels\AppCompanies`.
 */
class CompaniesSearch extends AppCompanies {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id', 'created_at'], 'integer'],
            [['name', 'description', 'phone1', 'phone2', 'address', 'type', 'reprisentative_name', 'updated_at'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = AppCompanies::find();

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
            'reprisentative_name' => $this->reprisentative_name,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
                ->andFilterWhere(['like', 'description', $this->description])
                ->andFilterWhere(['like', 'phone1', $this->phone1])
                ->andFilterWhere(['like', 'phone2', $this->phone2])
                ->andFilterWhere(['like', 'address', $this->address])
                ->andFilterWhere(['like', 'type', $this->type]);

        return $dataProvider;
    }

}
