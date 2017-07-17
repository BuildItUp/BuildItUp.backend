<?php

namespace common\models;

use Yii;
use \common\models\base\Progress as BaseProgress;

/**
 * This is the model class for table "progress".
 */
class Progress extends BaseProgress
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['project_id'], 'integer'],
            [['description'], 'string'],
            [['date'], 'safe'],
            [['photo_path'], 'string', 'max' => 255],
            // [['lock'], 'default', 'value' => '0'],
            // [['lock'], 'mootensai\components\OptimisticLockValidator']
        ]);
    }
	
}
