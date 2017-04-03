<?php

namespace frontend\modules\api\controllers;

class CityController extends \yii\rest\ActiveController
{
	public $modelClass = 'common\models\Cities';

    public function actionIndex()
    {
        return $this->render('index');
    }

}
