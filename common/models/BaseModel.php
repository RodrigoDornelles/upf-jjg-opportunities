<?php
namespace common\models;

use Yii;

class BaseModel extends \yii\db\ActiveRecord
{
    public $order = ['id' => SORT_DESC];
    public $pageSize = 20;

    public function beforeSave($insert)
    {
        if (!parent::beforeSave($insert)) {
            return false;
        }
        
        if ($this->isNewRecord && $this->hasAttribute('date_created_at')) {
            $this->setAttribute('date_created_at', new \yii\db\Expression('now()'));
        }
        
        if ($this->hasAttribute('date_updated_at')){
            $this->setAttribute('date_updated_at', new \yii\db\Expression('now()'));
        }

        return true;
    }

}