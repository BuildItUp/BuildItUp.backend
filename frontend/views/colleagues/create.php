<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\colleagues */

$this->title = 'Create Colleagues';
$this->params['breadcrumbs'][] = ['label' => 'Colleagues', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="colleagues-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
