<?php 

namespace frontend\modules\curriculum;

use Yii;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'frontend\modules\curriculum\controllers';

    public function init()
    {
        parent::init();
        return true;
    }
}