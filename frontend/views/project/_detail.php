<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model common\models\Project */

?>
<div class="project-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Html::encode($model->name) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'visible' => false],
        [
            'attribute' => 'customer.id',
            'label' => 'Customer',
        ],
        'name',
        'type',
        'description:ntext',
        [
            'attribute' => 'city.name',
            'label' => 'City',
        ],
        'address:ntext',
        'estimated_budget',
        'fixed_budget',
        'start',
        'finish',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>