<?php
namespace frontend\modules\curriculum\controllers;

use Yii;

/**
 * SiteBase controller
 */
class SiteController extends SiteBaseController
{
    function actionIndex()
    {
        return $this->renderContent('oi');
    }
}