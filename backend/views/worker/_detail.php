<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model common\models\Worker */

?>
<div class="worker-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Html::encode($model->id) ?></h2>
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
</div>