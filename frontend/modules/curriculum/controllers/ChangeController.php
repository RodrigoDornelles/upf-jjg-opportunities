<?php
namespace frontend\modules\curriculum\controllers;

use common\models\my\Curriculum;
use common\models\my\CurriculumLanguage;
use common\models\my\CurriculumGraduate;
use common\models\my\CurriculumExperience;
use kartik\grid\EditableColumnAction;

use yii\helpers\ArrayHelper;

use Yii;

/**
 * SiteBase controller
 */
class ChangeController extends SiteBaseController
{
    public function actions()
    {
        return ArrayHelper::merge(parent::actions(), [
            'edit-language' => [                                      
                'class' => EditableColumnAction::className(),  
                'modelClass' => CurriculumLanguage::className(),
            ],
            'edit-graduate' => [                                      
                'class' => EditableColumnAction::className(),  
                'modelClass' => CurriculumGraduate::className(),
            ],
            'edit-experience' => [                                      
                'class' => EditableColumnAction::className(),  
                'modelClass' => CurriculumExperience::className(),
            ]
        ]);
    }

    public function actionCreateLanguage()
    {
        $model = new CurriculumLanguage(['id_curriculum' => Curriculum::one()->id]);

        if ($model->load(Yii::$app->request->post()) && $model->save()){
            return $this->renderAjax('_formLanguage', ['model'=> $model]);
        }
    }

    public function actionCreateGraduate()
    {
        $model = new CurriculumGraduate(['id_curriculum' => Curriculum::one()->id]);

        if ($model->load(Yii::$app->request->post()) && $model->save()){
            return $this->renderAjax('_formGraduate', ['model'=> $model]);
        }
    }

    public function actionCreateExperience()
    {
        $model = new CurriculumExperience(['id_curriculum' => Curriculum::one()->id]);

        if ($model->load(Yii::$app->request->post()) && $model->save()){
            return $this->renderAjax('_formExperience', ['model'=> $model]);
        }
    }

    /**
     * Delete Curriculum apend
     *
     * @param string $modelclass
     * @param id $id
     * @return mixed html
     */
    public function actionDelete($modelclass, $id)
    {
        $model = (new $modelclass)->findOne(['id'=> $id, 'id_curriculum' => Curriculum::one()->id]);

        if(!$model){
            throw new \yii\web\NotFoundHttpException('Já foi removido!');
        }
                
        if ($model->delete() && Yii::$app->request->isAjax) {
            return true;               
        }

        return $this->redirect(['index']);
    }

    /**
     * Update Curriculum basics info
     *
     * @return mixed html
     */
    function actionIndex()
    {   
        $model = Curriculum::one();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('', [
                [
                    'title' => 'Success!!',
                    'text' => 'your abstract has been updated successfully!',
                    'timer' => 2000,
                ],
            ]);

            return $this->redirect('/curriculum');
        } 

        return $this->render('index', [
            'model' => $model
        ]);
    }


    /**
     * Starts a new Curriculum
     *
     * @return mixed html
     */
    function actionInit()
    {   
        $model = Curriculum::one();
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('', [
                [
                    'title' => 'Congratulations!!',
                    'text' => 'now we can start your curriculum!',
                    'timer' => 2000,
                ],
            ]);
        } 

        if(!$model->isNewRecord){
            return $this->redirect('/curriculum/update');
        }

        return $this->render('create', [
            'model' => $model
        ]);
    }

    public function beforeAction($action)
    {
        if (!parent::beforeAction($action)){
            return false;
        }

        if (!Yii::$app->request->isAjax && $action->id != 'init' && $action->id != 'index' && $action->id != 'delete'){
            return $this->redirect(['/curriculum/change'])->send();
        }

        return true;
    }
}