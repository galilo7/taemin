<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Test;

/**
 * TestSearch represents the model behind the search form about `app\models\Test`.
 */
class TestSearch extends Test {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['man'], 'integer'],
            [['adefaultASD', 'adefaultASD_NULL', 'bdefaultTIME_create', 'bdefaultTIME_create_update', 'bTIMENOTnul', 'bTIMENULL'], 'safe'],
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
        $query = Test::find();

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
//        [['bdefaultTIME_create', 'bdefaultTIME_create_update', 'bTIMENOTnul', 'bTIMENULL'], 'safe'],
//        [['adefaultASD', 'adefaultASD_NULL'], 'string', 'max' => 10],
        // grid filtering conditions
        //THOSE ARE THE LOADED (SAFE) ATTRIBUTES IN THE MODEL____ SET SAFE BECAUSE THEY HAVE VALIDATION RULES
        $query->andFilterWhere([
            'man' => $this->man,
            'bdefaultTIME_create' => $this->bdefaultTIME_create,
            'bdefaultTIME_create_update' => $this->bdefaultTIME_create_update,
            'bTIMENOTnul' => $this->bTIMENOTnul,
            'bTIMENULL' => $this->bTIMENULL,
        ]);
//THOSE ATTRIBUTES ARE NOT SAFE ==>> NOT LOADED IN THE MODEL ==>> compared each alone.
        $query->andFilterWhere(['like', 'adefaultASD', $this->adefaultASD])
                ->andFilterWhere(['like', 'adefaultASD_NULL', $this->adefaultASD_NULL]);

        return $dataProvider;
    }

}
