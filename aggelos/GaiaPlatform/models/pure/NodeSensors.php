<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "node_sensors".
 *
 * @property int $sensor_id
 * @property int $node_id
 * @property string $created_at
 * @property string|null $updated_at
 *
 * @property Node $node
 * @property Sensor $sensor
 */
class NodeSensors extends \app\models\generated\NodeSensors
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'node_sensors';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sensor_id', 'node_id'], 'required'],
            [['sensor_id', 'node_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['sensor_id', 'node_id'], 'unique', 'targetAttribute' => ['sensor_id', 'node_id']],
            [['node_id'], 'exist', 'skipOnError' => true, 'targetClass' => Node::class, 'targetAttribute' => ['node_id' => 'id']],
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
            'node_id' => Yii::t('app', 'Node ID'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * Gets query for [[Node]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNode()
    {
        return $this->hasOne(Node::class, ['id' => 'node_id']);
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
