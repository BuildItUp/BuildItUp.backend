<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Progress */

$this->title = 'Create Progress';
$this->params['breadcrumbs'][] = ['label' => 'Progress', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="progress-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
