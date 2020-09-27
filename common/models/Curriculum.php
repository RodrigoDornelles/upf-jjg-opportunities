<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "curriculum".
 *
 * @property int $id
 * @property int $id_user
 * @property string|null $abstract
 * @property string $date_created_at
 * @property string $date_updated_at
 *
 * @property User $user
 */
class Curriculum extends \common\models\BaseModel
{
    private static $_curriculum;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'curriculum';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user'], 'required'],
            [['id_user'], 'integer'],
            [['abstract'], 'string', 'max' => 522],
            [['id_user'], 'unique'],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => \common\models\User::className(), 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'id_user' => Yii::t('app', 'User'),
            'abstract' => Yii::t('app', 'Abstract'),
            'experience' => Yii::t('app', 'Experiences'),
            'language' => Yii::t('app', 'Languages'),
            'graduate' => Yii::t('app', 'Graduates'),
            'user.name' => Yii::t('app', 'Name'),
            'user.age' => Yii::t('app', 'Age'),
            'user.email' => Yii::t('app', 'Email'),
            'user.countryWithFlag' => Yii::t('app', 'Country'),
            'date_created_at' => Yii::t('app', 'Created At'),
            'date_updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(\common\models\User::className(), ['id' => 'id_user']);
    }

    /**
     * Gets Singleton My Curriculum
     *
     * @return object
     */
    public static function one()
    {
        // if already instantiated return curriculum object model
        if (static::$_curriculum){
            return $_curriculum;
        }

        // try to instantiate corresponding model for the curriculum
        if (($_curriculum = static::findOne(['id_user' => Yii::$app->user->identity->id])) == null){
            // create new model for the curriculum
            $_curriculum = new static;
            $_curriculum->id_user = Yii::$app->user->identity->id;
        }

        // return curriculum object model
        return $_curriculum;
    } 
}
