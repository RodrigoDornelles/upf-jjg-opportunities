<?php

namespace common\models\my;

use Yii;

/**
 * This is the model class for table "curriculum_language".
 *
 * @property int $id
 * @property int $id_curriculum
 * @property string|null $name
 * @property int|null $level
 *
 * @property Curriculum $curriculum
 */
class CurriculumLanguage extends \common\models\BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'curriculum_language';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_curriculum'], 'required'],
            [['id_curriculum', 'level'], 'integer'],
            [['name'], 'string', 'max' => 10],
            [['id_curriculum'], 'exist', 'skipOnError' => true, 'targetClass' => Curriculum::className(), 'targetAttribute' => ['id_curriculum' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'id_curriculum' => Yii::t('app', 'Id Curriculum'),
            'name' => Yii::t('app', 'Name'),
            'level' => Yii::t('app', 'Level'),
        ];
    }

    /**
     * Gets query for [[Curriculum]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCurriculum()
    {
        return $this->hasOne(Curriculum::className(), ['id' => 'id_curriculum']);
    }
}
