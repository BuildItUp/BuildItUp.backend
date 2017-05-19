<?php

namespace frontend\modules\api\controllers;

use yii\filters\auth\QueryParamAuth;

class ProvinceController extends \yii\rest\ActiveController
{
	public $modelClass = 'common\models\Provinces';

	public function behaviors()
	{
	    $behaviors = parent::behaviors();
	    $behaviors['authenticator'] = [
	        'class' => QueryParamAuth::className(),
	    ];
	    // $behaviors['access'] = [
     //            'class' => AccessControl::className(),
     //            'only' => ['login', 'logout', 'signup'],
     //            'rules' => [
     //                [
     //                    'allow' => true,
     //                    'actions' => ['login', 'signup'],
     //                    'roles' => ['?'],
     //                ],
     //                [
     //                    'allow' => true,
     //                    'actions' => ['logout'],
     //                    'roles' => ['@'],
     //                ],
     //            ],
     //        ],
	    return $behaviors;
	}
}
