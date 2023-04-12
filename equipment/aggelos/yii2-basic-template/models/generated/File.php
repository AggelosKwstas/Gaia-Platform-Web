<?php

namespace app\models\generated;

use Yii;

/**
 * This is the model class for table "file".
 *
 * @property int $id
 * @property string $name
 * @property string $path
 * @property int $size
 * @property string $file_type
 * @property string $date_created
 * @property string|null $date_updated
 *
 * @property CustomerBiographyFile[] $customerBiographyFiles
 * @property Customer[] $customers
 */
class File extends  \app\models\Model
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'file';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'path', 'size', 'file_type'], 'required'],
            [['size'], 'integer'],
            [['date_created', 'date_updated'], 'safe'],
            [['name'], 'string', 'max' => 256],
            [['path'], 'string', 'max' => 512],
            [['file_type'], 'string', 'max' => 128],
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
            'name' => Yii::t('app', 'Title'),
            'path' => Yii::t('app', 'Path'),
            'size' => Yii::t('app', 'Size'),
            'file_type' => Yii::t('app', 'File Type'),
            'date_created' => Yii::t('app', 'Date Created'),
            'date_updated' => Yii::t('app', 'Date Updated'),
        ];
    }

    /**
     * Gets query for [[CustomerBiographyFiles]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCustomerBiographyFiles()
    {
        return $this->hasMany(CustomerBiographyFile::className(), ['biography_file_id' => 'id']);
    }

    /**
     * Gets query for [[Customers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCustomers()
    {
        return $this->hasMany(Customer::className(), ['id' => 'customer_id'])->viaTable('customer_biography_file', ['biography_file_id' => 'id']);
    }
}
