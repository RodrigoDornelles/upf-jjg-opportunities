<?php
namespace frontend\modules\curriculum\controllers;

use common\models\Curriculum;

use Yii;

/**
 * SiteBase controller
 */
class MyController extends \frontend\controllers\SiteBaseController
{
    
    /**
     * Update Curriculum basics info
     *
     * @return mixed html
     */
    function actionUpdate()
    {   
        $model = Curriculum::one();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('', [
                [
                    'title' => 'Success!!',
                    'text' => 'your curriculum has been saved.',
                    'timer' => 2000,
                ],
            ]);

            return $this->redirect('/curriculum/my/view');
        } 

        return $this->render('update', [
            'model' => $model
        ]);
    }

    function actionView()
    {
        return $this->render('view', [
            'model' => Curriculum::one()
        ]);
    }


    function actionPdf()
    {
        return Curriculum::one()->getPdf()->render();
    }
}