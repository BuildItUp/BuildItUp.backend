<?php

namespace common\models;

use Yii;
use \common\models\base\Provinces as BaseProvinces;

/**
 * This is the model class for table "provinces".
 */
class Provinces extends BaseProvinces
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['name'], 'string', 'max' => 255],
            // [['lock'], 'default', 'value' => '0'],
            // [['lock'], 'mootensai\components\OptimisticLockValidator']
        ]);
    }
	
}
