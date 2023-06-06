<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "time_interval".
 *
 * @property int $id
 * @property string $name
 * @property int $time_type_id
 * @property float $time_multiplier
 * @property string $created_at
 * @property string|null $updated_at
 *
 * @property AverageMeasurements[] $averageMeasurements
 * @property TimeType $timeType
 */
class TimeInterval extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'time_interval';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'time_type_id', 'time_multiplier'], 'required'],
            [['time_type_id'], 'integer'],
            [['time_multiplier'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 64],
            [['name'], 'unique'],
            [['time_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => TimeType::class, 'targetAttribute' => ['time_type_id' => 'id']],
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
            'time_type_id' => Yii::t('app', 'Time Type ID'),
            'time_multiplier' => Yii::t('app', 'Time Multiplier'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * Gets query for [[AverageMeasurements]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAverageMeasurements()
    {
        return $this->hasMany(AverageMeasurements::class, ['time_interval_id' => 'id']);
    }

    /**
     * Gets query for [[TimeType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTimeType()
    {
        return $this->hasOne(TimeType::class, ['id' => 'time_type_id']);
    }
}
