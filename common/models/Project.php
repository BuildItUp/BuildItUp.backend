<?php

namespace common\models;

use Yii;
use \common\models\base\Project as BaseProject;

/**
 * This is the model class for table "project".
 */
class Project extends BaseProject
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['customer_id', 'city_id', 'estimated_budget', 'fixed_budget'], 'integer'],
            [['description', 'address'], 'string'],
            [['city_id', 'address'], 'required'],
            [['start', 'finish'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['type'], 'string', 'max' => 50],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ]);
    }
	
}
