<?php

namespace app\models\pure;
use app\models\pure\Image;
use Yii;
use yii\helpers\ArrayHelper;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $email
 * @property string $firstname
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
 * @property UserType $userType
 * @property UserType $userType0
 * @property Gender $gender
 * @property Gender $gender0
 * @property Image $image
 * @property Image $image0
 */
class User extends \app\models\generated\User implements IdentityInterface
{

    public const STATUS_DELETED = 0;
    public const STATUS_INACTIVE = 9;
    public const STATUS_ACTIVE = 10;

    public $password;
    public $password_repeat;
    public $image_upload;
    const SCENARIOCREATE = 'create';
    const SCENARIOUPDATE = 'update';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }


    public function getScenarios()
    {

        return [
            self::SCENARIOCREATE => ['username', 'email', 'firstname', 'lastname', 'user_type_id', 'date_born', 'token', 'status', 'gender_id', 'password_hash','password','password_repeat'],
            self::SCENARIOUPDATE => ['username', 'email', 'firstname', 'lastname', 'user_type_id', 'date_born', 'token', 'status', 'gender_id'],
        ];
    }

    public function rules()
    {

        $scenarios = $this->getScenarios();
        return [
            [$scenarios[self::SCENARIOCREATE], 'required', 'on' => self::SCENARIOCREATE],
            [$scenarios[self::SCENARIOUPDATE], 'required', 'on' => self::SCENARIOUPDATE],
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
            [['email'], 'email'],
            [['username'], 'unique'],
            [['date_created', 'date_updated', 'date_born'], 'safe'],
            ['status', 'default', 'value' => self::STATUS_INACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_INACTIVE, self::STATUS_DELETED]],
            [['password_reset_token'], 'unique'],
            [['phone'], 'match', 'pattern' => '/^\+?1?\s*?\(?\d{3}(?:\)|[-|\s])?\s*?\d{3}[-|\s]?\d{4}$/'],
            ['password_repeat', 'compare', 'compareAttribute' => 'password', 'message' => "Passwords don't match"],
            [['user_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => UserType::className(), 'targetAttribute' => ['user_type_id' => 'id']],
            [['gender_id'], 'exist', 'skipOnError' => true, 'targetClass' => Gender::className(), 'targetAttribute' => ['gender_id' => 'id']],
            [['image_id'], 'exist', 'skipOnError' => true, 'targetClass' => Image::className(), 'targetAttribute' => ['image_id' => 'id']],
        ];
    }


    public function getIsAdmin()
    {



        return $this->userType->name == "admin";

    }


    public function getIsManager()
    {

        return $this->userType->name == "manager";
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {


        return ArrayHelper::merge(parent::attributeLabels(),
            [
                'password' => Yii::t('app', 'Password'),
                'password_repeat' => Yii::t('app', 'Password Repeat'),
            ]);
    }

    public function getImagePath()
    {
        if ($this->image)
            return $this->image;
        return null;
    }

    public function newImagePath()
    {

        if ($this->image_upload && $this->image_upload instanceof \yii\web\UploadedFile)
            return "upload/user/" . strtotime("now") . rand() . "." . $this->image_upload->extension;
        return null;
    }

    public function getFullname()
    {
        return ucfirst($this->firstname) . " " . ucfirst($this->lastname);
    }



    public function login()
    {

        return Yii::$app->user->login($this, 3600 * 24 * 30);
        if ($this->validate()) {

            return Yii::$app->user->login($this, 3600 * 24 * 30);
        }
        return false;
    }

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }
        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds user by verification email token
     *
     * @param string $token verify email token
     * @return static|null
     */
    public static function findByVerificationToken($token)
    {
        return static::findOne([
            'verification_token' => $token,
            'status' => self::STATUS_INACTIVE
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return bool
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }
        $timestamp = (int)substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->getPrimaryKey();
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
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    public function generateEmailVerificationToken()
    {
        $this->verification_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }


    public static function getRestricted($user_id)
    {
        $manager_id = Yii::$app->user->identity->id;
        if (Yii::$app->user->identity->isAdmin)

            return self::find()->all();
        else if (Yii::$app->user->identity->isManager)
            return self::findBySql("select user.* from user where  user.id='$user_id'")->one();
        return [];
    }



    public function imageInstance()
    {

        $image = $this->hasOne(Image::className(), ['id' => 'image_id'])->one();
        if ($image) {


            return $image;
        }


        return new Image();
    }


}
