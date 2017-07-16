<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\colleagues */

$this->title = 'Update Colleagues: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Colleagues', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="colleagues-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
