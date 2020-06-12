<?php
namespace frontend\modules\jobs\controllers;

use Yii;

/**
 * SiteBase controller
 */
class SiteController extends SiteBaseController
{
    function actionIndex()
    {
        return $this->renderContent('comming!');
    }
}