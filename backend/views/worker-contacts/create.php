<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\WorkerContacts */

$this->title = 'Create Worker Contacts';
$this->params['breadcrumbs'][] = ['label' => 'Worker Contacts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="worker-contacts-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
