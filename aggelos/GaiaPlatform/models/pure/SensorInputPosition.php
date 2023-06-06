<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sensor_input_position".
 *
 * @property int $sensor_id
 * @property int $input_position_id
 * @property string $created_at
 * @property string|null $updated_at
 *
 * @property InputPosition $inputPosition
 * @property Sensor $sensor
 */
class SensorInputPosition extends \app\models\generated\SensorInputPosition
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sensor_input_position';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sensor_id', 'input_position_id'], 'required'],
            [['sensor_id', 'input_position_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['sensor_id', 'input_position_id'], 'unique', 'targetAttribute' => ['sensor_id', 'input_position_id']],
            [['input_position_id'], 'exist', 'skipOnError' => true, 'targetClass' => InputPosition::class, 'targetAttribute' => ['input_position_id' => 'id']],
            [['sensor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Sensor::class, 'targetAttribute' => ['sensor_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'sensor_id' => Yii::t('app', 'Sensor ID'),
            'input_position_id' => Yii::t('app', 'Input Position ID'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * Gets query for [[InputPosition]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInputPosition()
    {
        return $this->hasOne(InputPosition::class, ['id' => 'input_position_id']);
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
