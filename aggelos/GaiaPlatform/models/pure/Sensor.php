<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sensor".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property float|null $min_value
 * @property float|null $max_value
 * @property string|null $unit
 * @property float|null $hour_limit
 * @property float|null $eight_hours_limit
 * @property float|null $day_limit
 * @property float|null $month_limit
 * @property float|null $year_limit
 * @property string $created_at
 * @property string|null $updated_at
 *
 * @property AverageMeasurements[] $averageMeasurements
 * @property InputPosition[] $inputPositions
 * @property Measurements[] $measurements
 * @property NodeSensors[] $nodeSensors
 * @property Node[] $nodes
 * @property SensorInputPosition[] $sensorInputPositions
 */
class Sensor extends \app\models\generated\Sensor
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sensor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'name', 'description'], 'required'],
            [['id'], 'integer'],
            [['min_value', 'max_value', 'hour_limit', 'eight_hours_limit', 'day_limit', 'month_limit', 'year_limit'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'unit'], 'string', 'max' => 50],
            [['description'], 'string', 'max' => 255],
            [['name'], 'unique'],
            [['id'], 'unique'],
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
            'min_value' => Yii::t('app', 'Min Value'),
            'max_value' => Yii::t('app', 'Max Value'),
            'unit' => Yii::t('app', 'Unit'),
            'hour_limit' => Yii::t('app', 'Hour Limit'),
            'eight_hours_limit' => Yii::t('app', 'Eight Hours Limit'),
            'day_limit' => Yii::t('app', 'Day Limit'),
            'month_limit' => Yii::t('app', 'Month Limit'),
            'year_limit' => Yii::t('app', 'Year Limit'),
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
        return $this->hasMany(AverageMeasurements::class, ['sensor_id' => 'id']);
    }

    /**
     * Gets query for [[InputPositions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInputPositions()
    {
        return $this->hasMany(InputPosition::class, ['id' => 'input_position_id'])->viaTable('sensor_input_position', ['sensor_id' => 'id']);
    }

    /**
     * Gets query for [[Measurements]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMeasurements()
    {
        return $this->hasMany(Measurements::class, ['sensor_id' => 'id']);
    }

    /**
     * Gets query for [[NodeSensors]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNodeSensors()
    {
        return $this->hasMany(NodeSensors::class, ['sensor_id' => 'id']);
    }

    /**
     * Gets query for [[Nodes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNodes()
    {
        return $this->hasMany(Node::class, ['id' => 'node_id'])->viaTable('node_sensors', ['sensor_id' => 'id']);
    }

    /**
     * Gets query for [[SensorInputPositions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSensorInputPositions()
    {
        return $this->hasMany(SensorInputPosition::class, ['sensor_id' => 'id']);
    }
}
