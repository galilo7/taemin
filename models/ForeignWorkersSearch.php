<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\appmodels\AppForeignWorkers;

/**
 * ForeignWorkersSearch represents the model behind the search form about `app\models\appmodels\AppForeignWorkers`.
 */
class ForeignWorkersSearch extends AppForeignWorkers
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'r_available_taemin', 'r_customer', 'sale', 'paid', 'remaining'], 'integer'],
            [['code', 'contract_date', 'start_date', 'end_date', 'sale_letters', 'paid_letters', 'kafil_name', 'madmoun_name', 'worker_nationality', 'worker_sex', 'worker_birth', 'worker_passport_no', 'worker_job', 'created_at', 'updated_at'], 'safe'],
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
        $query = AppForeignWorkers::find();

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
            'worker_birth' => $this->worker_birth,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['like', 'sale_letters', $this->sale_letters])
            ->andFilterWhere(['like', 'paid_letters', $this->paid_letters])
            ->andFilterWhere(['like', 'kafil_name', $this->kafil_name])
            ->andFilterWhere(['like', 'madmoun_name', $this->madmoun_name])
            ->andFilterWhere(['like', 'worker_nationality', $this->worker_nationality])
            ->andFilterWhere(['like', 'worker_sex', $this->worker_sex])
            ->andFilterWhere(['like', 'worker_passport_no', $this->worker_passport_no])
            ->andFilterWhere(['like', 'worker_job', $this->worker_job]);

        return $dataProvider;
    }
}
