<?php 

namespace frontend\modules\jobs;

use Yii;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'frontend\modules\jobs\controllers';

    public function init()
    {
        parent::init();
        return true;
    }
}