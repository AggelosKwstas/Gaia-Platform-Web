<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "borrowing_user".
 *
 * @property int $id
 * @property string $name
 * @property int $category_id
 * @property string $phone
 * @property string $organization
 * @property int $product_id
 *
 * @property Category $category
 * @property Equipment[] $equipments
 * @property Equipment $product
 */
class BorrowingUser extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'borrowing_user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'category_id', 'phone', 'organization', 'product_id'], 'required'],
            [['category_id', 'product_id'], 'integer'],
            [['name', 'organization'], 'string', 'max' => 64],
            [['phone'], 'string', 'max' => 15],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Equipment::class, 'targetAttribute' => ['product_id' => 'id']],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['category_id' => 'id']],
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
            'category_id' => Yii::t('app', 'Category ID'),
            'phone' => Yii::t('app', 'Phone'),
            'organization' => Yii::t('app', 'Organization'),
            'product_id' => Yii::t('app', 'Product ID'),
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }

    /**
     * Gets query for [[Equipments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEquipments()
    {
        return $this->hasMany(Equipment::class, ['borrowed_id' => 'id']);
    }

    /**
     * Gets query for [[Product]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Equipment::class, ['id' => 'product_id']);
    }
}
