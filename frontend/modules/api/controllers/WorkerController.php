<?php

namespace frontend\modules\api\controllers;

use Yii;
use common\models\Worker;
use yii\filters\auth\QueryParamAuth;

class WorkerController extends \yii\rest\ActiveController
{
	public $modelClass = 'common\models\Worker';

	public function behaviors()
	{
	    $behaviors = parent::behaviors();
	    $behaviors['authenticator'] = [
	        'class' => QueryParamAuth::className(),
	        'except' => ['register'],
	    ];
	    return $behaviors;
	}

    public function actionRegister()
    {
        $worker = new Worker();
		if ($worker->attributes = Yii::$app->request->post()) {
			$worker->avg_rating = .0;
			$worker->personal_budget = 0;
			$worker->project_budget = 0;
			$worker->status = true;
			if ($worker->save()) {
				return ['status' => 'success', 'message' => 'Register succeed', 'data' => $worker];
			}
		}
		return ['status' => 'failure', 'message' => 'Register failed'];
    }
}
