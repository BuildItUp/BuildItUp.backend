<?php

namespace frontend\modules\api\controllers;

use Yii;
use common\models\Customer;
use common\models\User;
use yii\filters\auth\QueryParamAuth;

class CustomerController extends \yii\rest\ActiveController
{
    public $modelClass = 'common\models\Customer';

	public function behaviors()
	{
	    $behaviors = parent::behaviors();
	    $behaviors['authenticator'] = [
	        'class' => QueryParamAuth::className(),
	        'except' => [
	        	'register',
	        	'get-user',
	        ],
	    ];
	    return $behaviors;
	}

	public function actionRegister() {
		$customer = new Customer();
		if ($customer->attributes = Yii::$app->request->post()) {
			$customer->budget = 0;
			if ($customer->save()) {
				return ['status' => 'success', 'message' => 'Register succeed', 'data' => $customer];
			}
		}
		return ['status' => 'failure', 'message' => 'Register failed'];
	}

	//API for get relations

	public function actionGetUser($id) {
		$customer = new Customer();
		if ($customer = Customer::findOne($id)) {
			return ['status' => 'success', 'message' => 'User found', 'data' => $customer->user];
		} else {
			return ['status' => 'failure', 'message' => 'User not found'];
		}
	}
}
