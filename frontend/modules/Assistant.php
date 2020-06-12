<?php 

namespace frontend\modules;

use Yii;

class Assistant extends \yii\base\Module
{
    public $controllerNamespace = 'frontend\modules\assistant\controllers';

    public function init()
    {
        parent::init();
        return true;
    }
}