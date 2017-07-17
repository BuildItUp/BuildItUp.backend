<?php

namespace common\models;

use Yii;
use \common\models\base\BudgetLog as BaseBudgetLog;

/**
 * This is the model class for table "budget_log".
 */
class BudgetLog extends BaseBudgetLog
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['worker_id', 'customer_id', 'amount'], 'integer'],
            [['date'], 'safe'],
            [['action'], 'string', 'max' => 255],
            [['token'], 'string', 'max' => 25],
        ]);
    }
	
}
