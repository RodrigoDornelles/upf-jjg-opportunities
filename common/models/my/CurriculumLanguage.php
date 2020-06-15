<?php

namespace common\models\my;

use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
use kartik\icons\Icon;

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
    const LEVEL_LIST = [
        'Basic',
        'Intermediate',
        'Advanced',
        'Fluent'
    ];

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
            'name' => Yii::t('app', 'Language'),
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

    public function GetLevelFormated()
    {
        return ArrayHelper::getValue($this->level, self::LEVEL_LIST, null);
    }

    /**
     * Gets All Laguages
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
                'attribute' => 'name',
                'editableOptions' => ['formOptions' => ['action' => ['/curriculum/change/edit-language']]]
            ],
            [
                'class' => 'kartik\grid\EditableColumn',
                'attribute' => 'level',
                'value' => 'levelFormated',
                'editableOptions' => [
                    'inputType' => 'dropDownList',
                    'data' => self::LEVEL_LIST,
                    'displayValueConfig'=> self::LEVEL_LIST,
                    'formOptions' => ['action' => ['/curriculum/change/edit-language']]
                ]
            ],
            ['class' => 'yii\grid\ActionColumn',
                'options' => ['width' => 32],
                'template' => '{delete}',
                'buttons' => [
                    'delete' => function ($url, $model) {
                        return \yii\helpers\Html::a(Icon::show('trash'), \yii\helpers\Url::to(['delete', 'id' => $model->id, 'modelclass' => self::className()]), [
                            'title' => 'Excluir',
                            'class' => 'sa-delete',
                            'data-pjax-id' => '#grid-curriculo-idioma'
                        ]);
                    },
                ]
            ],
        ];
    }
}
