<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\appmodels\AppVehicles;

/**
 * VehiclesSearch represents the model behind the search form about `app\models\appmodels\AppVehicles`.
 */
class VehiclesSearch extends AppVehicles
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'horses', 'passengers', 'preview_month', 'preview_cost'], 'integer'],
            [['type', 'model', 'vehicle_usage', 'year', 'net_load', 'registration_number', 'shecci_number', 'engine_number', 'created_at', 'updated_at'], 'safe'],
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
        $query = AppVehicles::find();

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
            'year' => $this->year,
            'horses' => $this->horses,
            'passengers' => $this->passengers,
            'preview_month' => $this->preview_month,
            'preview_cost' => $this->preview_cost,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'model', $this->model])
            ->andFilterWhere(['like', 'vehicle_usage', $this->vehicle_usage])
            ->andFilterWhere(['like', 'net_load', $this->net_load])
            ->andFilterWhere(['like', 'registration_number', $this->registration_number])
            ->andFilterWhere(['like', 'shecci_number', $this->shecci_number])
            ->andFilterWhere(['like', 'engine_number', $this->engine_number]);

        return $dataProvider;
    }
}
