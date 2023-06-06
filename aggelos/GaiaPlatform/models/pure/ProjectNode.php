<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "project_node".
 *
 * @property int $project_id
 * @property int $node_id
 * @property string $created_at
 * @property string|null $updated_at
 *
 * @property Node $node
 * @property Project $project
 */
class ProjectNode extends \app\models\generated\ProjectNode
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'project_node';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['project_id', 'node_id'], 'required'],
            [['project_id', 'node_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['project_id', 'node_id'], 'unique', 'targetAttribute' => ['project_id', 'node_id']],
            [['node_id'], 'exist', 'skipOnError' => true, 'targetClass' => Node::class, 'targetAttribute' => ['node_id' => 'id']],
            [['project_id'], 'exist', 'skipOnError' => true, 'targetClass' => Project::class, 'targetAttribute' => ['project_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'project_id' => Yii::t('app', 'Project ID'),
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
     * Gets query for [[Project]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProject()
    {
        return $this->hasOne(Project::class, ['id' => 'project_id']);
    }
}
