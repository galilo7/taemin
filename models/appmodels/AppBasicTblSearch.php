<?php

namespace app\models\appmodels;

use app\models\appmodels\AppBasicTbl;
use app\models\CfwSearch;
use app\models\ForeignWorkersSearch;
use app\models\HospitalsSearch;
use app\models\MoneyTransferSearch;
use app\models\SafarSearch;
use app\models\SchoolsSearch;
use app\models\VehicleTaeminSearch;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\data\ArrayDataProvider;
use yii\db\Query;
use yii\helpers\VarDumper;

/**
 * BasicTblSearch represents the model behind the search form about `app\models\appmodels\AppBasicTbl`.
 */
class AppBasicTblSearch extends AppBasicTbl {

    public $fullName;

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id', 'r_available_taemin', 'r_customer', 'sale', 'paid', 'remaining'], 'integer'],
            [['code', 'madmoun_name', 'contract_date', 'start_date', 'end_date', 'sale_letters', 'paid_letters', 'created_at', 'updated_at'], 'safe'],
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

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function searchForCustomer($params, $customerId) {
        $query = (new Query())
                ->select(["CONCAT('basic-tbl+', basic_tbl.id) AS id", 'basic_tbl.r_customer', 'basic_tbl.r_available_taemin', 'basic_tbl.code', 'basic_tbl.madmoun_name', 'basic_tbl.remaining', "CONCAT(customers.first_name, customers.fathers_name, customers.last_name) AS fullName", 'customers.first_name', 'customers.fathers_name', 'customers.last_name', 'available_taemin.name As taemin_name'])
                ->from('basic_tbl')
                ->join('LEFT JOIN', 'customers', 'customers.id = basic_tbl.r_customer')
                ->join('LEFT JOIN', 'available_taemin', 'available_taemin.id = basic_tbl.r_available_taemin');

        if (isset($customerId)) {
            $query->andFilterWhere(['r_customer' => $customerId]);
        }

        $cfwSearch = new CfwSearch();
        $foreignWorkersSearch = new ForeignWorkersSearch();
        $hospitalsSearch = new HospitalsSearch();
        $schoolsSearch = new SchoolsSearch();
        $safarSearch = new SafarSearch();
        $moneyTransferSearch = new MoneyTransferSearch();
        $vehicleTaeminSearch = new VehicleTaeminSearch();

        // add conditions that should always apply here
        $arr1 = $cfwSearch->mySearch($params, $customerId);
        $arr2 = $foreignWorkersSearch->mySearch($params, $customerId);
        $arr3 = $hospitalsSearch->mySearch($params, $customerId);
        $arr4 = $schoolsSearch->mySearch($params, $customerId);
        $arr5 = $safarSearch->mySearch($params, $customerId);
        $arr6 = $moneyTransferSearch->mySearch($params, $customerId);
        $arr7 = $vehicleTaeminSearch->mySearch($params, $customerId);



        $this->load($params);

        if (!$this->validate()) {

            $arr0 = $query->all();
            $arr = array_merge($arr0, $arr1, $arr2, $arr3, $arr4, $arr5, $arr6, $arr7);
            die(VarDumper::dump($arr, 4, TRUE));

            $dataProvider = new ArrayDataProvider([
                'allModels' => $arr,
                'sort' => [
                    'attributes' => ['id', 'code', 'r_available_taemin', 'r_customer', 'madmoun_name', 'remaining', 'end_date', 'updated_at'],
                    'defaultOrder' => ['updated_at' => SORT_DESC],
                ]
            ]);
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
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'code', $this->code])
                ->andFilterWhere(['like', 'madmoun_name', $this->madmoun_name])
                ->andFilterWhere(['like', 'sale_letters', $this->sale_letters])
                ->andFilterWhere(['like', 'paid_letters', $this->paid_letters])
                ->andFilterWhere(['like', 'fullName', $this->fullName]);

        $arr0 = $query->all();
        $arr = array_merge($arr0, $arr1, $arr2, $arr3, $arr4, $arr5, $arr6, $arr7);

        $dataProvider = new ArrayDataProvider([
            'allModels' => $arr,
            'sort' => [
                'attributes' => ['id', 'code', 'r_available_taemin', 'r_customer', 'madmoun_name', 'remaining', 'end_date', 'updated_at'],
                'defaultOrder' => ['updated_at' => SORT_DESC],
            ]
        ]);

//        \yii\helpers\VarDumper::dump($dataProvider->allModels[0], 4, true);
//        die("HERE");

        return $dataProvider;
    }

    public function searchOld($params) {
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
