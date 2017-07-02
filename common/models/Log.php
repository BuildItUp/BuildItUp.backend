<?php

namespace common\models;

use Yii;
use \common\models\base\Log as BaseLog;

/**
 * This is the model class for table "log".
 */
class Log extends BaseLog
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['user_id'], 'integer'],
            [['date'], 'safe'],
            [['table_name'], 'string', 'max' => 50],
            [['action'], 'string', 'max' => 255],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ]);
    }
	
}
