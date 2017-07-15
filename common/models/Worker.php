<?php

namespace common\models;

use Yii;
use \common\models\base\Worker as BaseWorker;

/**
 * This is the model class for table "worker".
 */
class Worker extends BaseWorker
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['project_id', 'user_id', 'city_id', 'specialization_id', 'personal_budget', 'project_budget', 'status'], 'integer'],
            [['user_id'], 'required'],
            [['birthdate', 'graduate_date'], 'safe'],
            [['avg_rating'], 'number'],
            [['fullname', 'photo_path', 'address', 'email', 'graduate'], 'string', 'max' => 255],
            [['citizen_id'], 'string', 'max' => 50],
            [['phone_number'], 'string', 'max' => 20],
            [['email'], 'unique'],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ]);
    }
	
}
