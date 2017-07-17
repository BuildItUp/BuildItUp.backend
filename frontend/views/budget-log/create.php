<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\BudgetLog */

$this->title = 'Create Budget Log';
$this->params['breadcrumbs'][] = ['label' => 'Budget Log', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="budget-log-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
