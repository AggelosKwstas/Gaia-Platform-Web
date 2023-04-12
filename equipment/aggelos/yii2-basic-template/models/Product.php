<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $name
 * @property string $serial_number
 * @property int $image_id
 * @property string $assigned_to
 * @property string $date
 *
 * @property Image $image
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'serial_number', 'image_id', 'assigned_to', 'date'], 'required'],
            [['image_id'], 'integer'],
            [['date'], 'safe'],
            [['name', 'assigned_to'], 'string', 'max' => 64],
            [['serial_number'], 'string', 'max' => 255],
            [['image_id'], 'exist', 'skipOnError' => true, 'targetClass' => Image::class, 'targetAttribute' => ['image_id' => 'id']],
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
            'serial_number' => Yii::t('app', 'Serial Number'),
            'image_id' => Yii::t('app', 'Product Image'),
            'assigned_to' => Yii::t('app', 'Assigned To'),
            'date' => Yii::t('app', 'Date'),
        ];
    }

    /**
     * Gets query for [[Image]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getImage()
    {
        return $this->hasOne(Image::class, ['id' => 'image_id']);
    }
}
