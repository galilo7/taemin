<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\appmodels\AppSafar;

/**
 * SafarSearch represents the model behind the search form about `app\models\appmodels\AppSafar`.
 */
class SafarSearch extends AppSafar {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id', 'r_available_taemin', 'r_customer', 'sale', 'paid', 'remaining'], 'integer'],
            [['code', 'madmoun_name', 'contract_date', 'start_date', 'end_date', 'sale_letters', 'paid_letters', 'destination_country', 'residence_country', 'nationality', 'sex', 'passport_no', 'birth', 'created_at', 'updated_at'], 'safe'],
            [['coverage'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios() {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function mySearch($params, $customerId) {
        $query = (new \yii\db\Query())
                ->select(["CONCAT('safar+', safar.id) AS id", 'safar.r_customer', 'safar.r_available_taemin', 'safar.code', 'safar.madmoun_name', 'safar.remaining', 'safar.updated_at', "CONCAT(customers.first_name, customers.fathers_name, customers.last_name) AS fullName", 'customers.first_name', 'customers.fathers_name', 'customers.last_name', 'available_taemin.name AS taemin_name'])
                ->from('safar')
                ->join('LEFT JOIN', 'customers', 'customers.id = safar.r_customer')
                ->join('LEFT JOIN', 'available_taemin', 'available_taemin.id = safar.r_available_taemin');

        if (isset($customerId)) {
            $query->andFilterWhere(['r_customer' => $customerId]);
        }


        $this->loadCommonParams($params);



        if (!$this->validate()) {
            $dataProvider = $query->all();
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
            'birth' => $this->birth,
//            'is_in_out' => $this->is_in_out,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'code', $this->code])
                ->andFilterWhere(['like', 'madmoun_name', $this->madmoun_name])
                ->andFilterWhere(['like', 'sale_letters', $this->sale_letters])
                ->andFilterWhere(['like', 'paid_letters', $this->paid_letters])
                ->andFilterWhere(['like', 'sex', $this->sex]);

//        $query->andFilterWhere(['like', 'fullName', $this->fullName]);
//        $query->andFilterWhere(['like', 'taemin_name', $this->taemin_name]);

        $dataProvider = $query->all();

        return $dataProvider;
    }

    public function loadCommonParams($params) {
        $this->id = isset($params['AppBasicTblSearch']['id']) ? $params['AppBasicTblSearch']['id'] : '';
        $this->code = isset($params['AppBasicTblSearch']['code']) ? $params['AppBasicTblSearch']['code'] : '';
        $this->r_available_taemin = isset($params['AppBasicTblSearch']['r_available_taemin']) ? $params['AppBasicTblSearch']['r_available_taemin'] : '';
        $this->r_customer = isset($params['AppBasicTblSearch']['r_customer']) ? $params['AppBasicTblSearch']['r_customer'] : '';
        $this->madmoun_name = isset($params['AppBasicTblSearch']['madmoun_name']) ? $params['AppBasicTblSearch']['madmoun_name'] : '';
        $this->contract_date = isset($params['AppBasicTblSearch']['contract_date']) ? $params['AppBasicTblSearch']['contract_date'] : '';
        $this->start_date = isset($params['AppBasicTblSearch']['start_date']) ? $params['AppBasicTblSearch']['start_date'] : '';
        $this->end_date = isset($params['AppBasicTblSearch']['end_date']) ? $params['AppBasicTblSearch']['end_date'] : '';
        $this->sale = isset($params['AppBasicTblSearch']['sale']) ? $params['AppBasicTblSearch']['sale'] : '';
        $this->sale_letters = isset($params['AppBasicTblSearch']['sale_letters']) ? $params['AppBasicTblSearch']['sale_letters'] : '';
        $this->paid_letters = isset($params['AppBasicTblSearch']['paid_letters']) ? $params['AppBasicTblSearch']['paid_letters'] : '';
        $this->remaining = isset($params['AppBasicTblSearch']['remaining']) ? $params['AppBasicTblSearch']['remaining'] : '';
        $this->coverage = isset($params['AppBasicTblSearch']['coverage']) ? $params['AppBasicTblSearch']['coverage'] : '';
        $this->created_at = isset($params['AppBasicTblSearch']['created_at']) ? $params['AppBasicTblSearch']['created_at'] : '';
        $this->updated_at = isset($params['AppBasicTblSearch']['updated_at']) ? $params['AppBasicTblSearch']['updated_at'] : '';
//        $this->fullName = isset($params['AppBasicTblSearch']['fullName']) ? $params['AppBasicTblSearch']['fullName'] : '';
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params) {
        $query = AppSafar::find();

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
            'birth' => $this->birth,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'code', $this->code])
                ->andFilterWhere(['like', 'madmoun_name', $this->madmoun_name])
                ->andFilterWhere(['like', 'sale_letters', $this->sale_letters])
                ->andFilterWhere(['like', 'paid_letters', $this->paid_letters])
                ->andFilterWhere(['like', 'destination_country', $this->destination_country])
                ->andFilterWhere(['like', 'residence_country', $this->residence_country])
                ->andFilterWhere(['like', 'nationality', $this->nationality])
                ->andFilterWhere(['like', 'sex', $this->sex])
                ->andFilterWhere(['like', 'passport_no', $this->passport_no]);

        return $dataProvider;
    }

}
