<?php
namespace common\models;

use yii\helpers\ArrayHelper;

use Yii;

class BaseModel extends \yii\db\ActiveRecord
{
    const LIST_BOOLEAN = [
        1 => 'Yes',
        2 => 'No'
    ];
    
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

    public function getRelationNames($relation,$params = [])
    {
        $separator = ArrayHelper::getValue($params, 'separator', "<br/>");
        $attribute = ArrayHelper::getValue($params, 'attribute', 'name');

        $rows = $this->$relation;

        if (!$rows) {
            return null;
        }

        $relationArr = array();
        foreach ($rows as $key => $row) {

            if (is_array($attribute)){
                $values = array();

                foreach ($attribute as $attr){
                    $values[]= $row->getAttribute($attr);
                }

                $relationArr[] = implode($separator, $values);
                continue;
            }

            $relationArr[] = $row->getAttribute($attribute);
        }

        return implode(!is_array($attribute)? $separator: '<br/>', $relationArr);
    }
    
}