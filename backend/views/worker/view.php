<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model common\models\Worker */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Workers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="worker-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Worker'.' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-3" style="margin-top: 15px">
            
            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ])
            ?>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'visible' => false],
        [
            'attribute' => 'project.name',
            'label' => 'Project',
        ],
        [
            'attribute' => 'user.username',
            'label' => 'User',
        ],
        [
            'attribute' => 'city.name',
            'label' => 'City',
        ],
        [
            'attribute' => 'specialization.name',
            'label' => 'Specialization',
        ],
        'fullname',
        'citizen_id',
        'birthdate',
        'photo_path',
        'address',
        'phone_number',
        'email:email',
        'graduate',
        'graduate_date',
        'avg_rating',
        'personal_budget',
        'project_budget',
        'status',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
    
    <div class="row">
<?php
if($providerBudgetLog->totalCount){
    $gridColumnBudgetLog = [
        ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'id', 'visible' => false],
                        [
                'attribute' => 'customer.id',
                'label' => 'Customer'
            ],
            'date',
            'action',
            'amount',
            'token',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerBudgetLog,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-budget-log']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Budget Log'),
        ],
        'export' => false,
        'columns' => $gridColumnBudgetLog
    ]);
}
?>
    </div>
    
    <div class="row">
<?php
if($providerCashFlow->totalCount){
    $gridColumnCashFlow = [
        ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'id', 'visible' => false],
            [
                'attribute' => 'customer.id',
                'label' => 'Customer'
            ],
                        'date',
            'amount',
            'description:ntext',
            'to_budget',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerCashFlow,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-cash-flow']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Cash Flow'),
        ],
        'export' => false,
        'columns' => $gridColumnCashFlow
    ]);
}
?>
    </div>
    
    <div class="row">
<?php
if($providerColleagues->totalCount){
    $gridColumnColleagues = [
        ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'id', 'visible' => false],
                            ];
    echo Gridview::widget([
        'dataProvider' => $providerColleagues,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-colleagues']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Colleagues'),
        ],
        'export' => false,
        'columns' => $gridColumnColleagues
    ]);
}
?>
    </div>
    
    <div class="row">
<?php
if($providerCoveredLoc->totalCount){
    $gridColumnCoveredLoc = [
        ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'id', 'visible' => false],
            [
                'attribute' => 'city.name',
                'label' => 'City'
            ],
                ];
    echo Gridview::widget([
        'dataProvider' => $providerCoveredLoc,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-covered-loc']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Covered Loc'),
        ],
        'export' => false,
        'columns' => $gridColumnCoveredLoc
    ]);
}
?>
    </div>
    
    <div class="row">
<?php
if($providerWorkerContacts->totalCount){
    $gridColumnWorkerContacts = [
        ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'id', 'visible' => false],
                        [
                'attribute' => 'customer.id',
                'label' => 'Customer'
            ],
    ];
    echo Gridview::widget([
        'dataProvider' => $providerWorkerContacts,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-worker-contacts']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Worker Contacts'),
        ],
        'export' => false,
        'columns' => $gridColumnWorkerContacts
    ]);
}
?>
    </div>
</div>
