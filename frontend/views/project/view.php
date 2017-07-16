<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model common\models\Project */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Project', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Project'.' '. Html::encode($this->title) ?></h2>
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
if($providerProgress->totalCount){
    $gridColumnProgress = [
        ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'id', 'visible' => false],
                        'photo_path',
            'description:ntext',
            'date',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerProgress,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-progress']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Progress'),
        ],
        'export' => false,
        'columns' => $gridColumnProgress
    ]);
}
?>

    </div>
    <div class="row">
        <h4>Customer<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnCustomer = [
        ['attribute' => 'id', 'visible' => false],
        'user_id',
        [
            'attribute' => 'city.name',
            'label' => 'City',
        ],
        'fullname',
        'citizen_id',
        'photo_path',
        'address:ntext',
        'phone_number',
        'email',
        'budget',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]);
    ?>
</div>
    <div class="row">
        <h4>Cities<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnCities = [
        ['attribute' => 'id', 'visible' => false],
        'provinces_id',
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
                'attribute' => 'user.username',
                'label' => 'User'
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
