<?php

namespace app\models\generated;

use Yii;

/**
 * This is the model class for table "{{%creation_log}}".
 *
 * @property int $id
 * @property int $customer_id
 * @property int $user_id
 * @property string $date_created
 * @property string|null $date_updated
 *
 * @property Customer $customer
 * @property User $user
 * @property UserLogRead[] $userLogReads
 * @property User[] $users
 */
class CreationLog extends \app\models\Model
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%creation_log}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['customer_id', 'user_id'], 'required'],
            [['customer_id', 'user_id'], 'integer'],
            [['date_created', 'date_updated'], 'safe'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['customer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Customer::className(), 'targetAttribute' => ['customer_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'customer_id' => Yii::t('app', 'Customer'),
            'user_id' => Yii::t('app', 'User'),
            'date_created' => Yii::t('app', 'Date Created'),
            'date_updated' => Yii::t('app', 'Date Updated'),
        ];
    }

    /**
     * Gets query for [[Customer]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(Customer::className(), ['id' => 'customer_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * Gets query for [[UserLogReads]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserLogReads()
    {
        return $this->hasMany(UserLogRead::className(), ['log_id' => 'id']);
    }

    /**
     * Gets query for [[Users]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['id' => 'user_id'])->viaTable('{{%user_log_read}}', ['log_id' => 'id']);
    }
}
