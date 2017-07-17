<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'User'.' '. Html::encode($this->title) ?></h2>
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
        'username',
        'auth_key',
        'password_hash',
        'password_reset_token',
        'access_token',
        'email:email',
        'pin',
        'login_as',
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
if($providerCustomer->totalCount){
    $gridColumnCustomer = [
        ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'id', 'visible' => false],
                        [
                'attribute' => 'city.name',
                'label' => 'City'
            ],
            'fullname',
            'citizen_id',
            'photo_path',
            'address',
            'phone_number',
            'email:email',
            'budget',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerCustomer,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-customer']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Customer'),
        ],
        'export' => false,
        'columns' => $gridColumnCustomer
    ]);
}
?>
    </div>
    
    <div class="row">
<?php
if($providerLog->totalCount){
    $gridColumnLog = [
        ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'id', 'visible' => false],
                        'table_name',
            'date',
            'action',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerLog,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-log']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Log'),
        ],
        'export' => false,
        'columns' => $gridColumnLog
    ]);
}
?>
    </div>
    
    <div class="row">
<?php
if($providerNotification->totalCount){
    $gridColumnNotification = [
        ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'id', 'visible' => false],
                        'message:ntext',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerNotification,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-notification']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Notification'),
        ],
        'export' => false,
        'columns' => $gridColumnNotification
    ]);
}
?>
    </div>
    
    <div class="row">
<?php
if($providerWorker->totalCount){
    $gridColumnWorker = [
        ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'id', 'visible' => false],
            [
                'attribute' => 'project.name',
                'label' => 'Project'
            ],
                        [
                'attribute' => 'city.name',
                'label' => 'City'
            ],
            [
                'attribute' => 'specialization.name',
                'label' => 'Specialization'
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
    echo Gridview::widget([
        'dataProvider' => $providerWorker,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-worker']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Worker'),
        ],
        'export' => false,
        'columns' => $gridColumnWorker
    ]);
}
?>
    </div>
</div>
