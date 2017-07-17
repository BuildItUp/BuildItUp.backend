<?php

namespace frontend\modules\api\controllers;

use yii\filters\auth\QueryParamAuth;
use common\models\BudgetLog;
use common\models\User;
use Yii;

class TopUpController extends \yii\rest\ActiveController
{
	public $modelClass = 'common\models\BudgetLog';

	public function behaviors()
	{
	    $behaviors = parent::behaviors();
	    $behaviors['authenticator'] = [
	        'class' => QueryParamAuth::className(),
	    ];
	    return $behaviors;
	}

	public function actionSubmit() 
	{
		$customer = User::findOne(Yii::$app->request->post('user_id'))->customers[0];
		$token = Yii::$app->request->post('token');
		foreach ($customer->budgetLogs as $item) {
			if ($item->token == $token) {
				$customer->budget += $item->amount;
				$item->token = null;
				$customer->save();
				$item->save();
				return ['status' => 'success', 'message' => 'Top Up Completed :  Rp. '.$item->amount, 'data' => $item];
			}
		}
		return ['status' => 'failure', 'message' => 'Top Up Failed. Token is invalid.'];
	}
}
