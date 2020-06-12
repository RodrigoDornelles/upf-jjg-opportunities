<?php
namespace common\models;

use Yii;
use DateTime;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use powerkernel\flagiconcss\Flag;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use yii\helpers\ArrayHelper;

/**
 * User model
 *
 * @property integer $id
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $verification_token
 * @property string $email
 * @property string $auth_key
 * @property string $status
 * @property datetime $created_at
 * @property datetime $updated_at
 * @property string $password write-only password
 */
class User extends ActiveRecord implements IdentityInterface
{
    /**
     * STATUS ACCOUNT
     */
    const STATUS_ACTIVE = 'A';
    const STATUS_INACTIVE = 'I'; 
    const STATUS_DELETED = 'D';

    /**
     * LIST STATUS ACCOUNT
     */
    const LIST_STATUS = [
        self::STATUS_ACTIVE => 'Active',
        self::STATUS_INACTIVE => 'Inactived',
        self::STATUS_DELETED => 'Deleted'
    ];

    /**
     * SCENARIOS
     */
    const SCENARIO_LOGIN = 'login';
    const SCENARIO_REGISTER = 'register';

    public $password;
    public $password_repeat;
    public $rememberMe = true;

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
            /** name */
            ['name', 'string', 'max' => 255],
            ['name', 'required'],
            /** birth */
            ['date_birth', 'dateNormalize'],
            ['date_birth', 'safe'],
            ['date_birth', 'required'],
            /** contry */
            ['contry', 'string'],
            ['contry', 'required'],
            ['contry', 'in', 'range' => Local::LIST_CONTRYS],
            /** password */
            ['password', 'required', 'on' => self::SCENARIO_REGISTER],
            ['password', 'string', 'min' => 6],
            ['password_repeat','compare','compareAttribute' => 'password','skipOnEmpty' => false, 'on' => self::SCENARIO_REGISTER],
            /** email */
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.', 'on' => self::SCENARIO_REGISTER],
            /** status */
            ['status', 'default', 'value' => self::STATUS_INACTIVE],
            ['status', 'in', 'range' => array_keys(self::LIST_STATUS)],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function beforeSave($insert)
    {
        if (!parent::beforeSave($insert)) {
            return false;
        }

        if ($this->isNewRecord) {
            $this->date_created_at = new \yii\db\Expression('NOW()');
        } 

        $this->date_updated_at = new \yii\db\Expression('NOW()');
        return true;
    }

    public function signup()
    {
        if (!$this->validate()){
            return false;
        }

        $this->setPassword($this->password);
        $this->generateAuthKey();
        $this->generateEmailVerificationToken();
        return $this->save();
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByEmail($email)
    {
        return static::findOne(['email' => $email, 'status' => self::STATUS_ACTIVE]);
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
    public static function findByVerificationToken($token) {
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

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
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

    /**
     * Generates new token for email verification
     */
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

    public function dateNormalize($attribute, $params)
    {
        $date = $this->getAttribute($attribute);

        if ($date === null) {
            return ;
        }

        $date = str_replace('/', '-', $date);
        $this->$attribute = date('Y-m-d', strtotime($date));
    }

    public function getAge()
    {
        $relative = (new DateTime($this->date_birth))->diff(new DateTime('now'));
        $string = explode('|', Yii::$app->formatter->asDuration($relative, '|'));
        return ArrayHelper::getValue($string, 0, null);
    }

    public function getCountryWithFlag()
    {
        return strtr("{flag} {country}",[
            '{flag}' => Flag::widget(['country' => $this->contry]),
            '{country}' => Yii::t('app', $this->contry)
        ]);
    }
}