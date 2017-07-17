<?php

namespace common\models;

use Yii;
use \common\models\base\CashFlow as BaseCashFlow;

/**
 * This is the model class for table "cash_flow".
 */
class CashFlow extends BaseCashFlow
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['customer_id', 'worker_id', 'amount', 'to_budget'], 'integer'],
            [['date'], 'safe'],
            [['description'], 'string'],
           
        ]);
    }
	
}
