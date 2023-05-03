<?php

namespace app\models\generated;

use Yii;

/**
 * This is the model class for table "{{%user}}".
 *
 * @property int $id
 * @property string $username
 * @property string $email
 * @property string $fistname
 * @property string $lastname
 * @property int $user_type_id
 * @property string $date_born
 * @property string|null $phone
 * @property string|null $auth_key
 * @property string $token
 * @property int $status
 * @property int|null $image_id
 * @property int $gender_id
 * @property string $password_hash
 * @property string|null $password_reset_token
 * @property string $date_created
 * @property string|null $date_updated
 *
 * @property Gender $gender
 * @property Image $image
 * @property UserType $userType
 */
class User extends \app\models\Model
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'email', 'firstname', 'lastname', 'user_type_id', 'date_born', 'token', 'status', 'gender_id', 'password_hash'], 'required'],
            [['user_type_id', 'status', 'image_id', 'gender_id'], 'integer'],
            [['date_born', 'date_created', 'date_updated'], 'safe'],
            [['username', 'email', 'firstname', 'lastname'], 'string', 'max' => 128],
            [['phone'], 'string', 'max' => 16],
            [['auth_key'], 'string', 'max' => 32],
            [['token'], 'string', 'max' => 64],
            [['password_hash', 'password_reset_token'], 'string', 'max' => 255],
            [['password_reset_token'], 'unique'],
            [['token'], 'unique'],
            [['email'], 'unique'],
            [['username'], 'unique'],
            [['user_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => UserType::className(), 'targetAttribute' => ['user_type_id' => 'id']],
            [['gender_id'], 'exist', 'skipOnError' => true, 'targetClass' => Gender::className(), 'targetAttribute' => ['gender_id' => 'id']],
            [['image_id'], 'exist', 'skipOnError' => true, 'targetClass' => Image::className(), 'targetAttribute' => ['image_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'username' => Yii::t('app', 'Username'),
            'email' => Yii::t('app', 'Email'),
            'firstname' => Yii::t('app', 'Fistname'),
            'lastname' => Yii::t('app', 'Lastname'),
            'user_type_id' => Yii::t('app', 'User Type'),
            'date_born' => Yii::t('app', 'Date Born'),
            'phone' => Yii::t('app', 'Phone'),
            'auth_key' => Yii::t('app', 'Auth Key'),
            'token' => Yii::t('app', 'Token'),
            'status' => Yii::t('app', 'Status'),
            'image_id' => Yii::t('app', 'Image'),
            'gender_id' => Yii::t('app', 'Gender'),
            'password_hash' => Yii::t('app', 'Password Hash'),
            'password_reset_token' => Yii::t('app', 'Password Reset Token'),
            'date_created' => Yii::t('app', 'Date Created'),
            'date_updated' => Yii::t('app', 'Date Updated'),
        ];
    }

    /**
     * Gets query for [[Gender]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGender()
    {
        return $this->hasOne(Gender::className(), ['id' => 'gender_id']);
    }

    /**
     * Gets query for [[Image]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getImage()
    {
        return $this->hasOne(Image::className(), ['id' => 'image_id']);
    }

    /**
     * Gets query for [[UserType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserType()
    {
        return $this->hasOne(UserType::className(), ['id' => 'user_type_id']);
    }
}
