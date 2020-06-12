<?php
namespace frontend\modules\classroom\controllers;

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