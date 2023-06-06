<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Sensor;

/**
 * SensorSearch represents the model behind the search form of `app\models\Sensor`.
 */
class SensorSearch extends Sensor
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['name', 'description', 'unit', 'created_at', 'updated_at'], 'safe'],
            [['min_value', 'max_value', 'hour_limit', 'eight_hours_limit', 'day_limit', 'month_limit', 'year_limit'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Sensor::find();

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
            'min_value' => $this->min_value,
            'max_value' => $this->max_value,
            'hour_limit' => $this->hour_limit,
            'eight_hours_limit' => $this->eight_hours_limit,
            'day_limit' => $this->day_limit,
            'month_limit' => $this->month_limit,
            'year_limit' => $this->year_limit,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'unit', $this->unit]);

        return $dataProvider;
    }
}
