<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Equipment;

/**
 * EquipmentSearch represents the model behind the search form of `app\models\Equipment`.
 */
class EquipmentSearch extends Equipment
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'ergo_id', 'invoice_number', 'borrowed_id'], 'integer'],
            [['name', 'supplier', 'invoice_date', 'serial_number', 'date_from', 'date_to'], 'safe'],
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
        $query = Equipment::find();

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
            'ergo_id' => $this->ergo_id,
            'invoice_number' => $this->invoice_number,
            'invoice_date' => $this->invoice_date,
            'borrowed_id' => $this->borrowed_id,
            'date_from' => $this->date_from,
            'date_to' => $this->date_to,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'supplier', $this->supplier])
            ->andFilterWhere(['like', 'serial_number', $this->serial_number]);

        return $dataProvider;
    }
}
