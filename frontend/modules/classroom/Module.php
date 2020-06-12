<?php 

namespace frontend\modules\classroom;

use Yii;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'frontend\modules\classroom\controllers';

    public function init()
    {
        parent::init();
        return true;
    }
}