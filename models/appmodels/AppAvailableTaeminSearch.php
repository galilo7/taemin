<?php

namespace app\models\appmodels;

use app\models\appmodels\AppAvailableTaemin;
use app\models\AvailableTaeminSearch;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * AvailableTaeminSearch represents the model behind the search form about `app\models\appmodels\AppAvailableTaemin`.
 */
class AppAvailableTaeminSearch extends AvailableTaeminSearch {

    public $companyName;

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id', 'r_company', 'cost', 'price'], 'integer'],
            [['name', 'description', 'price_description', 'type', 'created_at', 'updated_at'], 'safe'],
            [['percentage'], 'number'],
            [['companyName'], 'safe'],
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
        $query = AppAvailableTaemin::find();
        $query->joinWith('companies');
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->setSort([
            'attributes' => [
                'updated_at' => [
                    'default' => SORT_DESC
                ],
                'companyName' => [
                    'asc' => ['companies.name' => SORT_ASC],
                    'desc' => ['companies.name' => SORT_DESC],
                    'label' => Yii::t('available_taemin', 'Company Name'),
                ],
                'name' => [
                    'asc' => ['available_taemin.name' => SORT_ASC],
                    'desc' => ['available_taemin.name' => SORT_DESC],
                    'label' => 'Name',
                ],
                'cost' => [
                    'asc' => ['available_taemin.cost' => SORT_ASC],
                    'desc' => ['available_taemin.cost' => SORT_DESC],
                    'cost' => 'Cost',
                ],
                'price' => [
                    'asc' => ['available_taemin.price' => SORT_ASC],
                    'desc' => ['available_taemin.price' => SORT_DESC],
                    'label' => 'Price',
                ],
                'type' => [
                    'asc' => ['available_taemin.type' => SORT_ASC],
                    'desc' => ['available_taemin.type' => SORT_DESC],
                    'label' => 'Type',
                ],
            ],
        ]);


        if (!($this->load($params) && $this->validate())) {
            $query->joinWith(['companies']); //this customer is called the relation name, from getCustomers() function in AppLogs, and same for taeminTypes 

            return $dataProvider;
        }

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
//            $query->joinWith(['companies']);

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

        $query->andFilterWhere(['like', 'companies.name', $this->companyName]);

        return $dataProvider;
    }

}

//<?php

//namespace app\models\appmodels;

//
//use app\models\AvailableTaeminSearch;
//use yii\base\Model;
//use yii\data\ActiveDataProvider;
//
//class AppAvailableTaeminSearch extends AvailableTaeminSearch {
//
//    public $companyName;
//
//    public function rules() {
//        $rules = parent::rules();
//        $rules[] = ['companyName', 'safe'];
//        return $rules;
//    }
//
//    public function scenarios() {
//        // bypass scenarios() implementation in the parent class
//        return Model::scenarios();
//    }
//
//    /**
//     * Creates data provider instance with search query applied
//     *
//     * @param array $params
//     *
//     * @return ActiveDataProvider
//     */
//    public function search($params) {
//        $query = AppAvailableTaemin::find();
//        $query->joinWith(['companies']);
//
//        // add conditions that should always apply here
//
//        $dataProvider = new ActiveDataProvider([
//            'query' => $query,
//        ]);
//
//        $this->load($params);
//
//        if (!$this->validate()) {
//            $query->joinWith(['companies']);
//
//            // uncomment the following line if you do not want to return any records when validation fails
//            // $query->where('0=1');
//            return $dataProvider;
//        }
//
//        // grid filtering conditions
//        $query->andFilterWhere([
//            'id' => $this->id,
//            'r_company' => $this->r_company,
//            'cost' => $this->cost,
//            'price' => $this->price,
//            'percentage' => $this->percentage,
//            'created_at' => $this->created_at,
//            'updated_at' => $this->updated_at,
//        ]);
//
//        $query->andFilterWhere(['like', 'name', $this->name])
//                ->andFilterWhere(['like', 'description', $this->description])
//                ->andFilterWhere(['like', 'price_description', $this->price_description])
//                ->andFilterWhere(['like', 'type', $this->type]);
//        $query->andFilterWhere(['like', 'companies.name', $this->companyName]);
//
//
//        return $dataProvider;
//    }
//
//}
