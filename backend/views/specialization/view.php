<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model common\models\Specialization */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Specializations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="specialization-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Specialization'.' '. Html::encode($this->title) ?></h2>
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
        'name',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
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
                'attribute' => 'user.username',
                'label' => 'User'
            ],
            [
                'attribute' => 'city.name',
                'label' => 'City'
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
