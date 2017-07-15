<?php

namespace common\models;

use Yii;
use \common\models\base\CoveredLoc as BaseCoveredLoc;

/**
 * This is the model class for table "covered_loc".
 */
class CoveredLoc extends BaseCoveredLoc
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['city_id', 'worker_id'], 'integer'],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ]);
    }
	
}
