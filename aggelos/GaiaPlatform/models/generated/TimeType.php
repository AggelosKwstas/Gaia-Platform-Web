<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "time_type".
 *
 * @property int $id
 * @property string $name
 * @property int $time_seconds
 * @property string $created_at
 * @property string|null $updated_at
 *
 * @property TimeInterval[] $timeIntervals
 */
class TimeType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'time_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'time_seconds'], 'required'],
            [['time_seconds'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 64],
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
            'time_seconds' => Yii::t('app', 'Time Seconds'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * Gets query for [[TimeIntervals]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTimeIntervals()
    {
        return $this->hasMany(TimeInterval::class, ['time_type_id' => 'id']);
    }
}
