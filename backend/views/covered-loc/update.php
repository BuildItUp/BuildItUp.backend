<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CoveredLoc */

$this->title = 'Update Covered Loc: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Covered Loc', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="covered-loc-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
