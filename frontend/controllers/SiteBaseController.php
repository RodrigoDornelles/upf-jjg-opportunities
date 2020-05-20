<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

use yii\helpers\Url;
use yii\helpers\Html;
/**
 * Site controller
 */
class SiteBaseController extends \yii\web\Controller
{
     /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    // allow authenticated users
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    // allow especify actions
                    [
                        'actions' => ['error', 'login', 'about'],
                        'allow' => true,
                    ],
                    // allow especify controllers
                    [
                        'controllers' => ['tutorial', 'authentication'],
                        'allow' => true,
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    #'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function beforeAction($action)
    {
        if (!parent::beforeAction($action)) {
            return false;
        }
        
        /// first time in app
        if (!Yii::$app->request->cookies->has('tutorial')) {
            $this->redirect(['tutorial/index']);
        }

        return true; 
    }

    /**
     * render multiples views
     * 
     * @return string
     */
    protected function renderPages($pages)
    {
        $content = "";

        foreach($pages as $page) {
            $content .= Html::tag('section', $this->renderPartial($page), [
                'style' => 'width:100vw;height:100vh'
            ]);
        }

        return $this->renderContent($content);
    }
}
