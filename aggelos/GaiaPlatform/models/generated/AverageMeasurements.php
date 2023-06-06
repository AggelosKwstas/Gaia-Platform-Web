<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "average_measurements".
 *
 * @property int $id
 * @property string $timestamp
 * @property float $average_value
 * @property int $counter
 * @property int $time_interval_id
 * @property int $sensor_id
 * @property string $created_at
 * @property string|null $updated_at
 *
 * @property Sensor $sensor
 * @property TimeInterval $timeInterval
 */
class AverageMeasurements extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'average_measurements';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['timestamp', 'average_value', 'counter', 'time_interval_id', 'sensor_id'], 'required'],
            [['timestamp', 'created_at', 'updated_at'], 'safe'],
            [['average_value'], 'number'],
            [['counter', 'time_interval_id', 'sensor_id'], 'integer'],
            [['time_interval_id'], 'exist', 'skipOnError' => true, 'targetClass' => TimeInterval::class, 'targetAttribute' => ['time_interval_id' => 'id']],
            [['sensor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Sensor::class, 'targetAttribute' => ['sensor_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'timestamp' => Yii::t('app', 'Timestamp'),
            'average_value' => Yii::t('app', 'Average Value'),
            'counter' => Yii::t('app', 'Counter'),
            'time_interval_id' => Yii::t('app', 'Time Interval ID'),
            'sensor_id' => Yii::t('app', 'Sensor ID'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * Gets query for [[Sensor]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSensor()
    {
        return $this->hasOne(Sensor::class, ['id' => 'sensor_id']);
    }

    /**
     * Gets query for [[TimeInterval]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTimeInterval()
    {
        return $this->hasOne(TimeInterval::class, ['id' => 'time_interval_id']);
    }
}
