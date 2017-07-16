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
            [['customer_id', 'city_id', 'estimated_budget', 'fixed_budget', 'status'], 'integer'],
            [['description', 'address'], 'string'],
            [['city_id', 'address', 'created_by', 'updated_by'], 'required'],
            [['start', 'finish', 'created_at', 'updated_at'], 'safe'],
            [['name', 'created_by', 'updated_by'], 'string', 'max' => 255],
            [['type'], 'string', 'max' => 50]
        ]);
    }
	
}
