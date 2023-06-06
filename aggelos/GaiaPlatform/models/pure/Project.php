<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "project".
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property string $city
 * @property int $country_id
 * @property string $created_at
 * @property string|null $updated_at
 *
 * @property Country $country
 * @property Node[] $nodes
 * @property ProjectNode[] $projectNodes
 */
class Project extends \app\models\generated\Project
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'project';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'city', 'country_id'], 'required'],
            [['country_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'city'], 'string', 'max' => 128],
            [['description'], 'string', 'max' => 512],
            [['name'], 'unique'],
            [['country_id'], 'exist', 'skipOnError' => true, 'targetClass' => Country::class, 'targetAttribute' => ['country_id' => 'id']],
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
            'city' => Yii::t('app', 'City'),
            'country_id' => Yii::t('app', 'Country ID'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * Gets query for [[Country]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCountry()
    {
        return $this->hasOne(Country::class, ['id' => 'country_id']);
    }

    /**
     * Gets query for [[Nodes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNodes()
    {
        return $this->hasMany(Node::class, ['id' => 'node_id'])->viaTable('project_node', ['project_id' => 'id']);
    }

    /**
     * Gets query for [[ProjectNodes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProjectNodes()
    {
        return $this->hasMany(ProjectNode::class, ['project_id' => 'id']);
    }
}
