<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\WorkerContacts */

$this->title = 'Update Worker Contacts: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Worker Contacts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="worker-contacts-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
