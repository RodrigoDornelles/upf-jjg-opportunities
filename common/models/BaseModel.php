<?php
namespace common\models;

use Yii;

class BaseModel extends \yii\db\ActiveRecord
{
    public function beforeSave($insert)
    {
        if (!parent::beforeSave($insert)) {
            return false;
        }
        
        if ($this->isNewRecord) {
            $this->setAttribute('date_created_at', new \yii\db\Expression('now()'));
        }

        $this->setAttribute('date_updated_at', new \yii\db\Expression('now()'));
        return true;
    }

}