<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\colleagues */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Colleagues', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="colleagues-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Colleagues'.' '. Html::encode($this->title) ?></h2>
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
            'attribute' => 'worker.id',
            'label' => 'Worker',
        ],
        [
            'attribute' => 'worWorker.id',
            'label' => 'Wor Worker',
        ],
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]);
?>
    </div>
    <div class="row">
        <h4>Worker<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnWorker = [
        ['attribute' => 'id', 'visible' => false],
        'project_id',
        'user_id',
        'city_id',
        'specialization_id',
        'fullname',
        'citizen_id',
        'birthdate',
        'photo_path',
        'address',
        'phone_number',
        'email',
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
        <h4>Worker<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnWorker = [
        ['attribute' => 'id', 'visible' => false],
        'project_id',
        'user_id',
        'city_id',
        'specialization_id',
        'fullname',
        'citizen_id',
        'birthdate',
        'photo_path',
        'address',
        'phone_number',
        'email',
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
</div>
