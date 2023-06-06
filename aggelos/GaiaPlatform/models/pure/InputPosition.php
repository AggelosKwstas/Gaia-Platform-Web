<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "input_position".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $created_at
 * @property string|null $updated_at
 *
 * @property SensorInputPosition[] $sensorInputPositions
 * @property Sensor[] $sensors
 */
class InputPosition extends \app\models\generated\InputPosition
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'input_position';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'description'], 'required'],
            [['description'], 'string'],
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
            'description' => Yii::t('app', 'Description'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * Gets query for [[SensorInputPositions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSensorInputPositions()
    {
        return $this->hasMany(SensorInputPosition::class, ['input_position_id' => 'id']);
    }

    /**
     * Gets query for [[Sensors]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSensors()
    {
        return $this->hasMany(Sensor::class, ['id' => 'sensor_id'])->viaTable('sensor_input_position', ['input_position_id' => 'id']);
    }
}
