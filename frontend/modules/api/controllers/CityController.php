<?php

namespace frontend\modules\api\controllers;

use yii\filters\auth\QueryParamAuth;
use common\models\Cities;

class CityController extends \yii\rest\ActiveController
{
	public $modelClass = 'common\models\Cities';

	public function behaviors()
	{
	    $behaviors = parent::behaviors();
	    $behaviors['authenticator'] = [
	        'class' => QueryParamAuth::className(),
            'except' => ['get-all'],
	    ];
	    return $behaviors;
	}

	public function actionGetAll() {
		return Cities::find()->all();
	}
}
