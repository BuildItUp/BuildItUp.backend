<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model common\models\CashFlow */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Cash Flow', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cash-flow-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Cash Flow'.' '. Html::encode($this->title) ?></h2>
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
        [
            'attribute' => 'worker.id',
            'label' => 'Worker',
        ],
        'date',
        'amount',
        'description:ntext',
        'to_budget',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]);
?>
    </div>
    <div class="row">
        <h4>Customer<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnCustomer = [
        ['attribute' => 'id', 'visible' => false],
        'user_id',
        'city_id',
        'fullname',
        'citizen_id',
        'photo_path',
        'address',
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
