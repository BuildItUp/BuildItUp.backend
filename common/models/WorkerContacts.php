<?php

namespace common\models;

use Yii;
use \common\models\base\WorkerContacts as BaseWorkerContacts;

/**
 * This is the model class for table "worker_contacts".
 */
class WorkerContacts extends BaseWorkerContacts
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['worker_id', 'customer_id'], 'integer'],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ]);
    }
	
}
