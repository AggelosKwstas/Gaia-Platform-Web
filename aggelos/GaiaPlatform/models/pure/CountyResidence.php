<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "county_residence".
 *
 * @property int $id
 * @property string $name
 * @property int $country_id
 * @property string $created_at
 * @property string|null $updated_at
 *
 * @property Country $country
 * @property Node[] $nodes
 */
class CountyResidence extends \app\models\generated\CountyResidence
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'county_residence';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'country_id'], 'required'],
            [['country_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 64],
            [['name'], 'unique'],
            [['country_id'], 'exist', 'skipOnError' => true, 'targetClass' => Country::class, 'targetAttribute' => ['country_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'country_id' => Yii::t('app', 'Country ID'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * Gets query for [[Country]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCountry()
    {
        return $this->hasOne(Country::class, ['id' => 'country_id']);
    }

    /**
     * Gets query for [[Nodes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNodes()
    {
        return $this->hasMany(Node::class, ['county_residence_id' => 'id']);
    }
}
