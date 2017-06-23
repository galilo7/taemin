<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\appmodels\AppBasicTbl;

/**
 * BasicTblSearch represents the model behind the search form about `app\models\appmodels\AppBasicTbl`.
 */
class BasicTblSearch extends AppBasicTbl
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'r_available_taemin', 'r_customer', 'sale', 'paid', 'remaining'], 'integer'],
            [['code', 'madmoun_name', 'contract_date', 'start_date', 'end_date', 'sale_letters', 'paid_letters', 'created_at', 'updated_at'], 'safe'],
            [['coverage'], 'number'],
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
        $query = AppBasicTbl::find();

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
            'r_available_taemin' => $this->r_available_taemin,
            'r_customer' => $this->r_customer,
            'contract_date' => $this->contract_date,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'sale' => $this->sale,
            'paid' => $this->paid,
            'remaining' => $this->remaining,
            'coverage' => $this->coverage,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['like', 'madmoun_name', $this->madmoun_name])
            ->andFilterWhere(['like', 'sale_letters', $this->sale_letters])
            ->andFilterWhere(['like', 'paid_letters', $this->paid_letters]);

        return $dataProvider;
    }
}
