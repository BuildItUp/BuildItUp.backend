<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\CashFlow */

$this->title = 'Create Cash Flow';
$this->params['breadcrumbs'][] = ['label' => 'Cash Flow', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cash-flow-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
