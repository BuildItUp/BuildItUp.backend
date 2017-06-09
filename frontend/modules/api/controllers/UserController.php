<?php

namespace frontend\modules\api\controllers;

use Yii;
use common\models\User;
use frontend\models\SignupForm;
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
	        	'register'
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

					return ['status' => 'success', 'message' => 'Login succeed', 'data' => array_merge($user->toArray(), ['access_token' => $access_token])];
				}
				else {
					return ['status' => 'failure', 'message' => 'Username/Password is wrong'];
				} 
			}
			else {
				return ['status' => 'failure', 'message' => 'Username/Password is wrong'];
			} 
		}
		else {
			return ['status' => 'failure', 'message' => 'Username & Password cannot be blank'];
		} 
	}

	public function actionLogout()
	{
		$user = Yii::$app->user->identity;
		$user->access_token = '';
		$user->save();

		return ['status' => 'logout success'];
	}

	public function actionRegister()
	{
		$user = new SignupForm();
        if (User::find()->where(['username' => Yii::$app->request->post('username')])->one()) {
        	return ['status' => 'failure', 'message' => 'Username already exist'];
        } else {
        	if ($user->attributes = Yii::$app->request->post()) {
	            if ($user = $user->signup()) {
	                return ['status' => 'success', 'message' => 'Register succeed', 'data' => $user];
	            }
	        }
        }
        return ['status' => 'failure', 'message' => 'Register failed'];
	}
}
