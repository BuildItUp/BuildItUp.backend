<?php
use yii\helpers\Html;
use kartik\tabs\TabsX;
use yii\helpers\Url;
$items = [
    [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode('Worker'),
        'content' => $this->render('_detail', [
            'model' => $model,
        ]),
    ],
        [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode('Budget Log'),
        'content' => $this->render('_dataBudgetLog', [
            'model' => $model,
            'row' => $model->budgetLogs,
        ]),
    ],
            [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode('Cash Flow'),
        'content' => $this->render('_dataCashFlow', [
            'model' => $model,
            'row' => $model->cashFlows,
        ]),
    ],
            [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode('Colleagues'),
        'content' => $this->render('_dataColleagues', [
            'model' => $model,
            'row' => $model->colleagues,
        ]),
    ],
            [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode('Covered Loc'),
        'content' => $this->render('_dataCoveredLoc', [
            'model' => $model,
            'row' => $model->coveredLocs,
        ]),
    ],
                            [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode('Worker Contacts'),
        'content' => $this->render('_dataWorkerContacts', [
            'model' => $model,
            'row' => $model->workerContacts,
        ]),
    ],
    ];
echo TabsX::widget([
    'items' => $items,
    'position' => TabsX::POS_ABOVE,
    'encodeLabels' => false,
    'class' => 'tes',
    'pluginOptions' => [
        'bordered' => true,
        'sideways' => true,
        'enableCache' => false
    ],
]);
?>
