<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Measurements;

/**
 * MeasurementsSearch represents the model behind the search form of `app\models\Measurements`.
 */
class MeasurementsSearch extends Measurements
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'sensor_id'], 'integer'],
            [['timestamp', 'created_at', 'updated_at'], 'safe'],
            [['value'], 'number'],
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
        $query = Measurements::find();

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
            'timestamp' => $this->timestamp,
            'sensor_id' => $this->sensor_id,
            'value' => $this->value,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        return $dataProvider;
    }
}
