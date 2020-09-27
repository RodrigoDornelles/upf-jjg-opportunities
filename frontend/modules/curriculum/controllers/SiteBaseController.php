<?php
namespace frontend\modules\curriculum\controllers;

use common\models\Curriculum;

use Yii;

/**
 * Site controller
 */
class SiteBaseController extends \frontend\controllers\SiteBaseController
{

    public function beforeAction($action)
    {
        if (!parent::beforeAction($action)){
            return false;
        }

        if(Curriculum::one()->isNewRecord && !($this->id == 'my' && $action->id == 'update')){
            return $this->redirect(['/curriculum/my/update']);
        }

        return true;
    }
}