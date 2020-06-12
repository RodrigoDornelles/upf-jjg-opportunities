<?php 

namespace frontend\modules\assistant;

use Yii;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'frontend\modules\assistant\controllers';

    public function init()
    {
        parent::init();
        return true;
    }
}