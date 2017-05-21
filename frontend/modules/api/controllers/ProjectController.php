<?php

namespace frontend\modules\api\controllers;

use Yii;
use common\models\Project;
use yii\filters\auth\QueryParamAuth;

class ProjectController extends \yii\rest\ActiveController
{
	public $modelClass = 'common\models\Project';

	public function behaviors()
	{
	    $behaviors = parent::behaviors();
	    $behaviors['authenticator'] = [
	        'class' => QueryParamAuth::className(),
	    ];
	    return $behaviors;
	}

    public function actionCreate()
    {
        $project = new Project();
        if ($project->attributes = Yii::$app->request->post()) {
        	if ($project->save()) {
        		return ['status' => 'success', 'message' => 'Create project succeed', 'data' => $project];
        	}
        }
        return ['status' => 'failure', 'message' => 'Create project failed'];
    }

}
