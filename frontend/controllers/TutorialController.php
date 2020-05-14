<?php

namespace frontend\controllers;

use Yii;
use yii\web\Cookie;
use yii\helpers\Url;


/**
 * Tutorial controller
 */
class TutorialController extends SiteBaseController
{
    /**
     * Displays tutorial.
     *
     * @return string
     */
    public function actionIndex()
    {
        $this->layout = 'slider';

        return $this->renderPages([
            'welcome',
            'about',
            'finished'
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function beforeAction($action)
    {
        if (Yii::$app->request->isPost || Yii::$app->request->cookies->has('tutorial')) {
            Yii::$app->response->cookies->add( new Cookie([
                    'name' => 'tutorial',
                    'value' => true,
            ]));
            return $this->redirect(Url::previous());
        }

        return true; 
    }
}