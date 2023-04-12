<?php

namespace app\models\generated;

use Yii;

/**
 * This is the model class for table "{{%user_log_read}}".
 *
 * @property int $log_id
 * @property int $user_id
 * @property string|null $checked_time
 * @property string $date_created
 * @property string|null $date_updated
 *
 * @property CreationLog $log
 * @property User $user
 */
class UserLogRead extends  \app\models\Model
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user_log_read}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['log_id', 'user_id'], 'required'],
            [['log_id', 'user_id'], 'integer'],
            [['checked_time', 'date_created', 'date_updated'], 'safe'],
            [['log_id', 'user_id'], 'unique', 'targetAttribute' => ['log_id', 'user_id']],
            [['log_id'], 'exist', 'skipOnError' => true, 'targetClass' => CreationLog::className(), 'targetAttribute' => ['log_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'log_id' => Yii::t('app', 'Log'),
            'user_id' => Yii::t('app', 'User'),
            'checked_time' => Yii::t('app', 'Checked Time'),
            'date_created' => Yii::t('app', 'Date Created'),
            'date_updated' => Yii::t('app', 'Date Updated'),
        ];
    }

    /**
     * Gets query for [[Log]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLog()
    {
        return $this->hasOne(CreationLog::className(), ['id' => 'log_id']);
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
}
