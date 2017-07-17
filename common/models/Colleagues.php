<?php

namespace common\models;

use Yii;
use \common\models\base\Colleagues as BaseColleagues;

/**
 * This is the model class for table "colleagues".
 */
class Colleagues extends BaseColleagues
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['worker_id', 'wor_worker_id'], 'integer'],
            // [['lock'], 'default', 'value' => '0'],
            // [['lock'], 'mootensai\components\OptimisticLockValidator']
        ]);
    }
	
}
