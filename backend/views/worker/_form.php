<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datecontrol\DateControl;
/* @var $this yii\web\View */
/* @var $model common\models\Worker */
/* @var $form yii\widgets\ActiveForm */

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'BudgetLog', 
        'relID' => 'budget-log', 
        'value' => \yii\helpers\Json::encode($model->budgetLogs),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'CashFlow', 
        'relID' => 'cash-flow', 
        'value' => \yii\helpers\Json::encode($model->cashFlows),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'Colleagues', 
        'relID' => 'colleagues', 
        'value' => \yii\helpers\Json::encode($model->colleagues),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'CoveredLoc', 
        'relID' => 'covered-loc', 
        'value' => \yii\helpers\Json::encode($model->coveredLocs),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'WorkerContacts', 
        'relID' => 'worker-contacts', 
        'value' => \yii\helpers\Json::encode($model->workerContacts),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
?>

<div class="worker-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'project_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\common\models\Project::find()->orderBy('id')->asArray()->all(), 'id', 'name'),
        'options' => ['placeholder' => 'Choose Project'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'user_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\common\models\User::find()->orderBy('id')->asArray()->all(), 'id', 'username'),
        'options' => ['placeholder' => 'Choose User'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'city_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\common\models\Cities::find()->orderBy('id')->asArray()->all(), 'id', 'name'),
        'options' => ['placeholder' => 'Choose Cities'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'specialization_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\common\models\Specialization::find()->orderBy('id')->asArray()->all(), 'id', 'name'),
        'options' => ['placeholder' => 'Choose Specialization'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'fullname')->textInput(['maxlength' => true, 'placeholder' => 'Fullname']) ?>

    <?= $form->field($model, 'citizen_id')->textInput(['maxlength' => true, 'placeholder' => 'Citizen']) ?>

    <?= $form->field($model, 'birthdate')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose Birthdate',
                'autoclose' => true
            ]
        ],
    ]); ?>

    <?= $form->field($model, 'photo_path')->textInput(['maxlength' => true, 'placeholder' => 'Photo Path']) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true, 'placeholder' => 'Address']) ?>

    <?= $form->field($model, 'phone_number')->textInput(['maxlength' => true, 'placeholder' => 'Phone Number']) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true, 'placeholder' => 'Email']) ?>

    <?= $form->field($model, 'graduate')->textInput(['maxlength' => true, 'placeholder' => 'Graduate']) ?>

    <?= $form->field($model, 'graduate_date')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose Graduate Date',
                'autoclose' => true
            ]
        ],
    ]); ?>

    <?= $form->field($model, 'avg_rating')->textInput(['placeholder' => 'Avg Rating']) ?>

    <?= $form->field($model, 'personal_budget')->textInput(['maxlength' => true, 'placeholder' => 'Personal Budget']) ?>

    <?= $form->field($model, 'project_budget')->textInput(['maxlength' => true, 'placeholder' => 'Project Budget']) ?>

    <?= $form->field($model, 'status')->checkbox() ?>

    <?php
    $forms = [
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('BudgetLog'),
            'content' => $this->render('_formBudgetLog', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->budgetLogs),
            ]),
        ],
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('CashFlow'),
            'content' => $this->render('_formCashFlow', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->cashFlows),
            ]),
        ],
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('Colleagues'),
            'content' => $this->render('_formColleagues', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->colleagues),
            ]),
        ],
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('CoveredLoc'),
            'content' => $this->render('_formCoveredLoc', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->coveredLocs),
            ]),
        ],
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('WorkerContacts'),
            'content' => $this->render('_formWorkerContacts', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->workerContacts),
            ]),
        ],
    ];
    echo kartik\tabs\TabsX::widget([
        'items' => $forms,
        'position' => kartik\tabs\TabsX::POS_ABOVE,
        'encodeLabels' => false,
        'pluginOptions' => [
            'bordered' => true,
            'sideways' => true,
            'enableCache' => false,
        ],
    ]);
    ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Cancel'), Yii::$app->request->referrer , ['class'=> 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
