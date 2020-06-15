<?php

namespace common\models\my;

use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
use kartik\icons\Icon;

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
            [['id_curriculum', 'name', 'institute'], 'required'],
            [['id_curriculum', 'year_init', 'year_end'], 'integer'],
            [['name', 'institute'], 'string', 'max' => 150],
            [['finish'], 'boolean'],
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
            'name' => Yii::t('app', 'Course'),
            'institute' => Yii::t('app', 'Institute'),
            'year_init' => Yii::t('app', 'Year Init'),
            'year_end' => Yii::t('app', 'Year End'),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function afterSave($insert, $changedAttributes)
    {
        Curriculum::updateAll(['date_updated_at' => new \yii\db\Expression('now()')], ['id' => $this->id_curriculum]);
        parent::afterSave($insert, $changedAttributes);
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

    /**
     * Gets All Graduates
     *
     * @return \yii\data\ActiveDataProvider
     */
    public function getDataProvider()
    {
        return new ActiveDataProvider([
            'query' => self::find()->andWhere(['id_curriculum' => $this->id_curriculum]),
            'pagination' => false
        ]);
    }

    public function getGridColumns($searchModel = null)
    {
        return [
            [
                'class' => 'kartik\grid\EditableColumn',
                'attribute' => 'institute',
                'editableOptions' => ['formOptions' => ['action' => ['/curriculum/change/edit-graduate']]]
            ],
            [
                'class' => 'kartik\grid\EditableColumn',
                'attribute' => 'name',
                'editableOptions' => ['formOptions' => ['action' => ['/curriculum/change/edit-graduate']]]
            ],
            [
                'class' => 'kartik\grid\EditableColumn',
                'attribute' => 'finish',
                'format' => 'boolean',
                'editableOptions' => [
                    'inputType' => 'dropDownList',
                    'data' => self::LIST_BOOLEAN,
                    'displayValueConfig'=> self::LIST_BOOLEAN,
                    'formOptions' => ['action' => ['edit-formacao']]
                ]
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{delete}',
                'options' => ['width' => 32],
                'buttons' => [
                    'delete' => function ($url, $model) {
                        return \yii\helpers\Html::a(Icon::show('trash'), \yii\helpers\Url::to(['delete', 'id' => $model->id, 'modelclass' => self::className()]), [
                            'title' => 'Excluir',
                            'class' => 'sa-delete',
                            'data-pjax-id' => '#grid-curriculum-graduate',
                            'data-question' => 'Do you want to remove?',
                            'data-success' => 'Removed'
                        ]);
                    },
                ]
            ],
        ];
    }
}
