<?php
use kartik\grid\GridView;
use yii\data\ArrayDataProvider;

    $dataProvider = new ArrayDataProvider([
        'allModels' => $model->workers,
        'key' => 'id'
    ]);
    $gridColumns = [
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
        [
            'class' => 'yii\grid\ActionColumn',
            'controller' => 'worker'
        ],
    ];
    
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => $gridColumns,
        'containerOptions' => ['style' => 'overflow: auto'],
        'pjax' => true,
        'beforeHeader' => [
            [
                'options' => ['class' => 'skip-export']
            ]
        ],
        'export' => [
            'fontAwesome' => true
        ],
        'bordered' => true,
        'striped' => true,
        'condensed' => true,
        'responsive' => true,
        'hover' => true,
        'showPageSummary' => false,
        'persistResize' => false,
    ]);
