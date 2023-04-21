<?php

namespace app\models\generated;

use Yii;

/**
 * This is the model class for table "{{%gender}}".
 *
 * @property int $id
 * @property string $name
 * @property string $pretty_name
 * @property string $date_created
 * @property string|null $date_updated
 *
 * @property Customer[] $customers
 * @property User[] $users
 */
class Gender extends \app\models\Model
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%gender}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'pretty_name'], 'required'],
            [['date_created', 'date_updated'], 'safe'],
            [['name', 'pretty_name'], 'string', 'max' => 127],
            [['pretty_name'], 'unique'],
            [['name'], 'unique'],
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
            'pretty_name' => Yii::t('app', 'Pretty Name'),
            'date_created' => Yii::t('app', 'Date Created'),
            'date_updated' => Yii::t('app', 'Date Updated'),
        ];
    }

    /**
     * Gets query for [[Customers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCustomers()
    {
        return $this->hasMany(Customer::className(), ['gender_id' => 'id']);
    }

    /**
     * Gets query for [[Users]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['gender_id' => 'id']);
    }
}
