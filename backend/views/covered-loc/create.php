<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\CoveredLoc */

$this->title = 'Create Covered Loc';
$this->params['breadcrumbs'][] = ['label' => 'Covered Loc', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="covered-loc-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
