<?php

namespace app\models;

use app\models\appmodels\AppForeignWorkers;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\db\Query;

/**
 * ForeignWorkersSearch represents the model behind the search form about `app\models\appmodels\AppForeignWorkers`.
 */
class ForeignWorkersSearch extends AppForeignWorkers {

    public $fullName;

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id', 'r_available_taemin', 'r_customer', 'sale', 'paid', 'remaining'], 'integer'],
            [['code', 'contract_date', 'start_date', 'end_date', 'sale_letters', 'paid_letters', 'kafil_name', 'madmoun_name', 'worker_nationality', 'worker_sex', 'worker_birth', 'worker_passport_no', 'worker_job', 'created_at', 'updated_at'], 'safe'],
            [['coverage'], 'number'],
            [['fullName'], 'safe'],
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
//        $query = AppForeignWorkers::find()->where(['r_customer' => $customerId]);
//        $query = (new Query())
//                ->select('*')
//                ->from('foreign_workers')
//                ->where(['r_customer' => $customerId])
//                ->indexBy('id');
//        $query = (new Query())
//                ->select(["CONCAT('cfw+', foreign_workers.id) AS id", 'r_customer', 'r_available_taemin', 'code', 'madmoun_name', 'remaining', 'customers.first_name', 'customers.fathers_name', 'customers.last_name'])
//                ->from('foreign_workers')
//                ->join('INNER JOIN', 'customers', 'customers.id = foreign_workers.r_customer')
//                ->where(['r_customer' => $customerId]);

        $query = (new \yii\db\Query())
                ->select(["CONCAT('foreign-workers+', foreign_workers.id) AS id", 'foreign_workers.r_customer', 'foreign_workers.r_available_taemin', 'foreign_workers.code', 'foreign_workers.madmoun_name', 'foreign_workers.remaining', 'foreign_workers.updated_at', "CONCAT(customers.first_name, customers.fathers_name, customers.last_name) AS fullName", 'customers.first_name', 'customers.fathers_name', 'customers.last_name', 'available_taemin.name As taemin_name'])
                ->from('foreign_workers')
                ->join('LEFT JOIN', 'customers', 'customers.id = foreign_workers.r_customer')
                ->join('LEFT JOIN', 'available_taemin', 'available_taemin.id = foreign_workers.r_available_taemin');
        if (isset($customerId)) {
            $query->andFilterWhere(['r_customer' => $customerId]);
        }

//        $this->load($params);
        $this->id = isset($params['AppBasicTblSearch']['id']) ? $params['AppBasicTblSearch']['id'] : '';
        $this->code = isset($params['AppBasicTblSearch']['code']) ? $params['AppBasicTblSearch']['code'] : '';
//        $this->taemin_name = isset($params['AppBasicTblSearch']['taemin_name']) ? $params['AppBasicTblSearch']['taemin_name'] : '';
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
//        $this->property_no = isset($params['AppBasicTblSearch']['property_no']) ? $params['AppBasicTblSearch']['property_no'] : '';
//        $this->number_of_workers = isset($params['AppBasicTblSearch']['number_of_workers']) ? $params['AppBasicTblSearch']['number_of_workers'] : '';
//        $this->building = isset($params['AppBasicTblSearch']['building']) ? $params['AppBasicTblSearch']['building'] : '';
//        $this->field = isset($params['AppBasicTblSearch']['field']) ? $params['AppBasicTblSearch']['field'] : '';
        $this->created_at = isset($params['AppBasicTblSearch']['created_at']) ? $params['AppBasicTblSearch']['created_at'] : '';
        $this->updated_at = isset($params['AppBasicTblSearch']['updated_at']) ? $params['AppBasicTblSearch']['updated_at'] : '';
        $this->fullName = isset($params['AppBasicTblSearch']['fullName']) ? $params['AppBasicTblSearch']['fullName'] : '';


        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            $dataProvider = $query->all();

            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'code' => $this->code,
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
                ->andFilterWhere(['like', 'worker_job', $this->worker_job])
                ->andFilterWhere(['like', 'fullName', $this->fullName]);

        $dataProvider = $query->all();
        return $dataProvider;
    }

    public function searchOld($params) {
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
