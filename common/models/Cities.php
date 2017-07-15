<?php

namespace common\models;

use Yii;
use \common\models\base\Cities as BaseCities;

/**
 * This is the model class for table "cities".
 */
class Cities extends BaseCities
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['provinces_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ]);
    }
	
}
