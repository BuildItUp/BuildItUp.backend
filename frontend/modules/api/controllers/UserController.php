<?php

namespace frontend\modules\api\controllers;

use Yii;
use common\models\User;
use yii\filters\auth\QueryParamAuth;

class UserController extends \yii\rest\ActiveController
{
	public $modelClass = 'common\models\User';

	public function behaviors()
	{
	    $behaviors = parent::behaviors();
	    $behaviors['authenticator'] = [
	        'class' => QueryParamAuth::className(),
	        'except' => [
	        	'login',
	        	'create'
	        ]
	    ];
	    return $behaviors;
	}

	public function actionLogin()
	{
		$post = Yii::$app->request->post();

		if(isset($post['username'])&&isset($post['password'])) {
			$user = User::findByUsername($post['username']);
			if($user) {
				if($user->validatePassword($post['password'])){
					$access_token = Yii::$app->getSecurity()->generateRandomString();
					$user->access_token = $access_token;
					$user->save();

					return array_merge($user->toArray(), ['access_token' => $access_token]);
				}
				else {
					Yii::$app->response->statusCode = 401;
					return ['error' => 'wrong password'];
				} 
			}
			else {
				Yii::$app->response->statusCode = 401;
				return ['error' => 'wrong username'];
			} 
		}
		else {
			Yii::$app->response->statusCode = 401;
			return ['error' => 'username or password cannot be blank'];
		} 
	}

	public function actionLogout()
	{
		$user = Yii::$app->user->identity;
		$user->access_token = '';
		$user->save();

		return ['status' => 'logout success'];
	}
}
