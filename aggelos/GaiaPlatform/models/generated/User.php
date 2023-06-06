<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $email
 * @property string $password_hash
 * @property string $first_name
 * @property string $last_name
 * @property int $user_type_id
 * @property int $gender_id
 * @property int $country_id
 * @property string $address
 * @property string|null $verification_token
 * @property string|null $password_reset_token
 * @property string|null $token
 * @property string $created_at
 * @property string|null $updated_at
 *
 * @property Country $country
 * @property Gender $gender
 * @property UserType $userType
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'email', 'password_hash', 'first_name', 'last_name', 'user_type_id', 'gender_id', 'country_id', 'address'], 'required'],
            [['user_type_id', 'gender_id', 'country_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['username', 'email', 'password_hash', 'first_name', 'last_name', 'address', 'verification_token', 'password_reset_token', 'token'], 'string', 'max' => 128],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['token'], 'unique'],
            [['verification_token'], 'unique'],
            [['country_id'], 'exist', 'skipOnError' => true, 'targetClass' => Country::class, 'targetAttribute' => ['country_id' => 'id']],
            [['gender_id'], 'exist', 'skipOnError' => true, 'targetClass' => Gender::class, 'targetAttribute' => ['gender_id' => 'id']],
            [['user_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => UserType::class, 'targetAttribute' => ['user_type_id' => 'id']],
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
            'password_hash' => Yii::t('app', 'Password Hash'),
            'first_name' => Yii::t('app', 'First Name'),
            'last_name' => Yii::t('app', 'Last Name'),
            'user_type_id' => Yii::t('app', 'User Type ID'),
            'gender_id' => Yii::t('app', 'Gender ID'),
            'country_id' => Yii::t('app', 'Country ID'),
            'address' => Yii::t('app', 'Address'),
            'verification_token' => Yii::t('app', 'Verification Token'),
            'password_reset_token' => Yii::t('app', 'Password Reset Token'),
            'token' => Yii::t('app', 'Token'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * Gets query for [[Country]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCountry()
    {
        return $this->hasOne(Country::class, ['id' => 'country_id']);
    }

    /**
     * Gets query for [[Gender]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGender()
    {
        return $this->hasOne(Gender::class, ['id' => 'gender_id']);
    }

    /**
     * Gets query for [[UserType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserType()
    {
        return $this->hasOne(UserType::class, ['id' => 'user_type_id']);
    }
}
