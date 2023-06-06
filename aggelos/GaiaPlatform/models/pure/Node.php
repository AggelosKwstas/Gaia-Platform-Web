<?php

namespace app\models\pure;

use Yii;

/**
 * This is the model class for table "node".
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property int $node_type_id
 * @property string $address
 * @property string $mac_address
 * @property string $city
 * @property int $county_residence_id
 * @property int $postal_code
 * @property float $lat
 * @property float $lng
 * @property string $created_at
 * @property string|null $updated_at
 *
 * @property CountyResidence $countyResidence
 * @property NodeSensors[] $nodeSensors
 * @property NodeType $nodeType
 * @property ProjectNode[] $projectNodes
 * @property Project[] $projects
 * @property Sensor[] $sensors
 */
class Node extends \app\models\generated\Node
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'node';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'node_type_id', 'address', 'mac_address', 'city', 'county_residence_id', 'postal_code', 'lat', 'lng'], 'required'],
            [['description'], 'string'],
            [['node_type_id', 'county_residence_id', 'postal_code'], 'integer'],
            [['lat', 'lng'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'address', 'city'], 'string', 'max' => 128],
            [['mac_address'], 'string', 'max' => 32],
            [['name'], 'unique'],
            [['county_residence_id'], 'exist', 'skipOnError' => true, 'targetClass' => CountyResidence::class, 'targetAttribute' => ['county_residence_id' => 'id']],
            [['node_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => NodeType::class, 'targetAttribute' => ['node_type_id' => 'id']],
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
            'node_type_id' => Yii::t('app', 'Node Type ID'),
            'address' => Yii::t('app', 'Address'),
            'mac_address' => Yii::t('app', 'Mac Address'),
            'city' => Yii::t('app', 'City'),
            'county_residence_id' => Yii::t('app', 'County Residence ID'),
            'postal_code' => Yii::t('app', 'Postal Code'),
            'lat' => Yii::t('app', 'Lat'),
            'lng' => Yii::t('app', 'Lng'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * Gets query for [[CountyResidence]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCountyResidence()
    {
        return $this->hasOne(CountyResidence::class, ['id' => 'county_residence_id']);
    }

    /**
     * Gets query for [[NodeSensors]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNodeSensors()
    {
        return $this->hasMany(NodeSensors::class, ['node_id' => 'id']);
    }

    /**
     * Gets query for [[NodeType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNodeType()
    {
        return $this->hasOne(NodeType::class, ['id' => 'node_type_id']);
    }

    /**
     * Gets query for [[ProjectNodes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProjectNodes()
    {
        return $this->hasMany(ProjectNode::class, ['node_id' => 'id']);
    }

    /**
     * Gets query for [[Projects]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProjects()
    {
        return $this->hasMany(Project::class, ['id' => 'project_id'])->viaTable('project_node', ['node_id' => 'id']);
    }

    /**
     * Gets query for [[Sensors]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSensors()
    {
        return $this->hasMany(Sensor::class, ['id' => 'sensor_id'])->viaTable('node_sensors', ['node_id' => 'id']);
    }
}
