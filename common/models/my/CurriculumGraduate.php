<?php

namespace common\models\my;

use Yii;

/**
 * This is the model class for table "curriculum_graduate".
 *
 * @property int $id
 * @property int $id_curriculum
 * @property string|null $name
 * @property string|null $institute
 * @property int|null $year_init
 * @property int|null $year_end
 *
 * @property Curriculum $curriculum
 */
class CurriculumGraduate extends \common\models\BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'curriculum_graduate';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_curriculum'], 'required'],
            [['id_curriculum', 'year_init', 'year_end'], 'integer'],
            [['name', 'institute'], 'string', 'max' => 150],
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
            'institute' => Yii::t('app', 'Institute'),
            'year_init' => Yii::t('app', 'Year Init'),
            'year_end' => Yii::t('app', 'Year End'),
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
