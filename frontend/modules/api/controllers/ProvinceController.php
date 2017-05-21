<?php

namespace frontend\modules\api\controllers;

use yii\filters\auth\QueryParamAuth;
use common\models\Provinces;

class ProvinceController extends \yii\rest\ActiveController
{
	public $modelClass = 'common\models\Provinces';

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
          return Provinces::find()->all();
     }
}
