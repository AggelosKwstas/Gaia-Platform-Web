<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "measurements".
 *
 * @property int $id
 * @property string $timestamp
 * @property int $sensor_id
 * @property float $value
 * @property string $created_at
 * @property string|null $updated_at
 *
 * @property Sensor $sensor
 */
class Measurements extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'measurements';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['timestamp', 'sensor_id', 'value'], 'required'],
            [['timestamp', 'created_at', 'updated_at'], 'safe'],
            [['sensor_id'], 'integer'],
            [['value'], 'number'],
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
            'sensor_id' => Yii::t('app', 'Sensor ID'),
            'value' => Yii::t('app', 'Value'),
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
}
