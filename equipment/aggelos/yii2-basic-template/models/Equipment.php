<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "equipment".
 *
 * @property int $id
 * @property int $ergo_id
 * @property string $name
 * @property string $supplier
 * @property int $invoice_number
 * @property string $invoice_date
 * @property string $serial_number
 * @property int $borrowed_id
 * @property string $date_from
 * @property string $date_to
 *
 * @property BorrowingUser $borrowed
 * @property BorrowingUser[] $borrowingUsers
 * @property EquipmentImage[] $equipmentImages
 * @property Image[] $equipmentImages0
 * @property Ergo $ergo
 */
class Equipment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'equipment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ergo_id', 'name', 'supplier', 'invoice_number', 'invoice_date', 'serial_number', 'borrowed_id', 'date_from', 'date_to'], 'required'],
            [['ergo_id', 'invoice_number', 'borrowed_id'], 'integer'],
            [['invoice_date', 'date_from', 'date_to'], 'safe'],
            [['name'], 'string', 'max' => 35],
            [['supplier', 'serial_number'], 'string', 'max' => 64],
            [['ergo_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ergo::class, 'targetAttribute' => ['ergo_id' => 'id']],
            [['borrowed_id'], 'exist', 'skipOnError' => true, 'targetClass' => BorrowingUser::class, 'targetAttribute' => ['borrowed_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'ergo_id' => Yii::t('app', 'Ergo ID'),
            'name' => Yii::t('app', 'Name'),
            'supplier' => Yii::t('app', 'Supplier'),
            'invoice_number' => Yii::t('app', 'Invoice Number'),
            'invoice_date' => Yii::t('app', 'Invoice Date'),
            'serial_number' => Yii::t('app', 'Serial Number'),
            'borrowed_id' => Yii::t('app', 'Borrowed ID'),
            'date_from' => Yii::t('app', 'Date From'),
            'date_to' => Yii::t('app', 'Date To'),
        ];
    }

    /**
     * Gets query for [[Borrowed]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBorrowed()
    {
        return $this->hasOne(BorrowingUser::class, ['id' => 'borrowed_id']);
    }

    /**
     * Gets query for [[BorrowingUsers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBorrowingUsers()
    {
        return $this->hasMany(BorrowingUser::class, ['product_id' => 'id']);
    }

    /**
     * Gets query for [[EquipmentImages]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEquipmentImages()
    {
        return $this->hasMany(EquipmentImage::class, ['equipment_id' => 'id']);
    }

    /**
     * Gets query for [[EquipmentImages0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEquipmentImages0()
    {
        return $this->hasMany(Image::class, ['id' => 'equipment_image'])->viaTable('equipment_image', ['equipment_id' => 'id']);
    }

    /**
     * Gets query for [[Ergo]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getErgo()
    {
        return $this->hasOne(Ergo::class, ['id' => 'ergo_id']);
    }
}
