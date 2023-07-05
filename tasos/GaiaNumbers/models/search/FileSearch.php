<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\pure\File;
use yii\helpers\ArrayHelper;

/**
 * FileSearch represents the model behind the search form of `app\models\pure\File`.
 */
class FileSearch extends File
{
    /**
     * {@inheritdoc}
     */

    public $customer_id;
    public function rules()
    {
        return [
            [['id', 'size','customer_id'], 'integer'],
            [['name', 'path', 'file_type', 'date_created', 'date_updated'], 'safe'],
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

    public function attributeLabels()
    {


        return ArrayHelper::merge(parent::attributeLabels(),
            [
                'customer_id' => Yii::t('app', 'Customer'),
            ]);
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
        $query = self::find()->select([
            "file.*",
            "customer_biography_file.customer_id"
        ]);

        // add conditions that should always apply here
        $query->innerJoin("customer_biography_file", 'customer_biography_file.biography_file_id=[file].id');
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);
        $dataProvider->sort->attributes['customer_id'] = [
            'asc' => ['customer_id' => SORT_ASC],
            'desc' => ['customer_id' => SORT_DESC],
        ];
        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'size' => $this->size,
            'customer_id' => $this->customer_id,
            'date_updated' => $this->date_updated,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'path', $this->path])
            ->andFilterWhere(['like', 'file_type', $this->file_type])
            ->andFilterWhere(['like', 'CONVERT(date,date_created)', $this->date_created]);

        return $dataProvider;
    }
}
