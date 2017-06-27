<?php

namespace app\models;

use app\models\appmodels\AppCfw;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\db\Query;

/**
 * CfwSearch represents the model behind the search form about `app\models\appmodels\AppCfw`.
 */
class CfwSearch extends AppCfw {

    public $fullName;
    public $firstName;

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id', 'r_available_taemin', 'r_customer', 'sale', 'paid', 'remaining', 'number_of_workers'], 'integer'],
            [['code', 'taemin_name', 'madmoun_name', 'contract_date', 'start_date', 'end_date', 'sale_letters', 'paid_letters', 'property_no', 'building', 'field', 'created_at', 'updated_at'], 'safe'],
            [['coverage'], 'number'],
            [['fullName', 'firstName'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios() {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

// THE FOLLOWING METHOD RETURNS THE PRODUCED INSURANCE POLICIES FOR A CUSTOMER IF CUSTOMER ID IS NOT NULL, AND ALL PRODUCED POLICIES IF NOT SPECIFIED
    public function mySearch($params, $customerId) {

        $query = (new \yii\db\Query())
                ->select(["CONCAT('cfw+', cfw.id) AS id", 'cfw.r_customer', 'cfw.r_available_taemin', 'cfw.code', 'cfw.madmoun_name', 'cfw.remaining', 'cfw.updated_at', "CONCAT(customers.first_name, customers.fathers_name, customers.last_name) AS fullName", 'customers.first_name', 'customers.fathers_name', 'customers.last_name', 'available_taemin.name AS taemin_name'])
                ->from('cfw')
                ->join('LEFT JOIN', 'customers', 'customers.id = cfw.r_customer')
                ->join('LEFT JOIN', 'available_taemin', 'available_taemin.id = cfw.r_available_taemin');
        if (isset($customerId)) {
            $query->andFilterWhere(['r_customer' => $customerId]);
        }


        $this->id = isset($params['AppBasicTblSearch']['id']) ? $params['AppBasicTblSearch']['id'] : '';
        $this->code = isset($params['AppBasicTblSearch']['code']) ? $params['AppBasicTblSearch']['code'] : '';
        $this->taemin_name = isset($params['AppBasicTblSearch']['taemin_name']) ? $params['AppBasicTblSearch']['taemin_name'] : '';
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
        $this->property_no = isset($params['AppBasicTblSearch']['property_no']) ? $params['AppBasicTblSearch']['property_no'] : '';
        $this->number_of_workers = isset($params['AppBasicTblSearch']['number_of_workers']) ? $params['AppBasicTblSearch']['number_of_workers'] : '';
        $this->building = isset($params['AppBasicTblSearch']['building']) ? $params['AppBasicTblSearch']['building'] : '';
        $this->field = isset($params['AppBasicTblSearch']['field']) ? $params['AppBasicTblSearch']['field'] : '';
        $this->created_at = isset($params['AppBasicTblSearch']['created_at']) ? $params['AppBasicTblSearch']['created_at'] : '';
        $this->updated_at = isset($params['AppBasicTblSearch']['updated_at']) ? $params['AppBasicTblSearch']['updated_at'] : '';
        $this->fullName = isset($params['AppBasicTblSearch']['fullName']) ? $params['AppBasicTblSearch']['fullName'] : '';
//        die(\yii\helpers\VarDumper::dump($this, 4, TRUE));
        if (!$this->validate()) {
//            die('not validated');
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            $dataProvider = $query->all();

            return $dataProvider;
        }

//        die(\yii\helpers\VarDumper::dump($this, 4, TRUE));
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
            'number_of_workers' => $this->number_of_workers,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'code', $this->code])
                ->andFilterWhere(['like', 'taemin_name', $this->taemin_name])
                ->andFilterWhere(['like', 'madmoun_name', $this->madmoun_name])
                ->andFilterWhere(['like', 'sale_letters', $this->sale_letters])
                ->andFilterWhere(['like', 'paid_letters', $this->paid_letters])
                ->andFilterWhere(['like', 'property_no', $this->property_no])
                ->andFilterWhere(['like', 'building', $this->building])
                ->andFilterWhere(['like', 'field', $this->field])
                ->andFilterWhere(['like', 'fullName', $this->fullName]);

        $dataProvider = $query->all();
//        die(\yii\helpers\VarDumper::dump($dataProvider, 4, true));

        return $dataProvider;
    }

    public function search($params) {
        $query = AppCfw::find();

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
            'number_of_workers' => $this->number_of_workers,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'code', $this->code])
                ->andFilterWhere(['like', 'taemin_name', $this->taemin_name])
                ->andFilterWhere(['like', 'madmoun_name', $this->madmoun_name])
                ->andFilterWhere(['like', 'sale_letters', $this->sale_letters])
                ->andFilterWhere(['like', 'paid_letters', $this->paid_letters])
                ->andFilterWhere(['like', 'property_no', $this->property_no])
                ->andFilterWhere(['like', 'building', $this->building])
                ->andFilterWhere(['like', 'field', $this->field]);

        return $dataProvider;
    }

}
