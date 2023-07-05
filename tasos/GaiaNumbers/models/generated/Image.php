<?php

namespace app\models\generated;

use Yii;

/**
 * This is the model class for table "{{%image}}".
 *
 * @property int $id
 * @property string $name
 * @property string $path
 * @property int $size
 * @property int $width
 * @property int $height
 * @property string $path_modified
 * @property string $thumbnail_path
 * @property string $date_created
 * @property string|null $date_updated
 *
 * @property User[] $users
 */
class Image extends \app\models\Model
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%image}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'path', 'size', 'width', 'height', 'path_modified', 'thumbnail_path'], 'required'],
            [['size', 'width', 'height'], 'integer'],
            [['date_created', 'date_updated'], 'safe'],
            [['name'], 'string', 'max' => 256],
            [['path', 'path_modified', 'thumbnail_path'], 'string', 'max' => 512],
            [['path'], 'unique'],
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
            'path' => Yii::t('app', 'Path'),
            'size' => Yii::t('app', 'Size'),
            'width' => Yii::t('app', 'Width'),
            'height' => Yii::t('app', 'Height'),
            'path_modified' => Yii::t('app', 'Path Modified'),
            'thumbnail_path' => Yii::t('app', 'Thumbnail Path'),
            'date_created' => Yii::t('app', 'Date Created'),
            'date_updated' => Yii::t('app', 'Date Updated'),
        ];
    }

    /**
     * Gets query for [[Users]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['image_id' => 'id']);
    }
}
