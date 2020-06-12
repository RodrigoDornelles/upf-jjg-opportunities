<?php
namespace frontend\modules\curriculum\controllers;

use common\models\my\Curriculum;

use Yii;

/**
 * SiteBase controller
 */
class SiteController extends SiteBaseController
{
    function actionIndex()
    {
        return $this->render('index', [
            'model' => Curriculum::one()
        ]);
    }

    function actionCreate()
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

    function actionUpdate()
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
        } 

        return $this->render('update', [
            'model' => $model
        ]);
    }
}