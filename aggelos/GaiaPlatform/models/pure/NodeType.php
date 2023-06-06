<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "node_type".
 *
 * @property int $id
 * @property int $name
 * @property string $icon
 * @property string $description
 * @property string $created_at
 * @property string|null $updated_at
 *
 * @property Node[] $nodes
 */
class NodeType extends \app\models\generated\NodeType
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'node_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'icon', 'description'], 'required'],
            [['name'], 'integer'],
            [['description'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['icon'], 'string', 'max' => 127],
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
            'icon' => Yii::t('app', 'Icon'),
            'description' => Yii::t('app', 'Description'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * Gets query for [[Nodes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNodes()
    {
        return $this->hasMany(Node::class, ['node_type_id' => 'id']);
    }
}
