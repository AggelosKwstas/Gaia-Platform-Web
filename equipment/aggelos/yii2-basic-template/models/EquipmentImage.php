<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "equipment_image".
 *
 * @property int $equipment_id
 * @property int $equipment_image
 *
 * @property Equipment $equipment
 * @property Image $equipmentImage
 */
class EquipmentImage extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'equipment_image';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['equipment_id', 'equipment_image'], 'required'],
            [['equipment_id', 'equipment_image'], 'integer'],
            [['equipment_id', 'equipment_image'], 'unique', 'targetAttribute' => ['equipment_id', 'equipment_image']],
            [['equipment_id'], 'exist', 'skipOnError' => true, 'targetClass' => Equipment::class, 'targetAttribute' => ['equipment_id' => 'id']],
            [['equipment_image'], 'exist', 'skipOnError' => true, 'targetClass' => Image::class, 'targetAttribute' => ['equipment_image' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'equipment_id' => Yii::t('app', 'Equipment ID'),
            'equipment_image' => Yii::t('app', 'Equipment Image'),
        ];
    }

    /**
     * Gets query for [[Equipment]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEquipment()
    {
        return $this->hasOne(Equipment::class, ['id' => 'equipment_id']);
    }

    /**
     * Gets query for [[EquipmentImage]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEquipmentImage()
    {
        return $this->hasOne(Image::class, ['id' => 'equipment_image']);
    }
}
