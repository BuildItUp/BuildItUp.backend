<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Project */
/* @var $form yii\widgets\ActiveForm */

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'Progress', 
        'relID' => 'progress', 
        'value' => \yii\helpers\Json::encode($model->progresses),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'Worker', 
        'relID' => 'worker', 
        'value' => \yii\helpers\Json::encode($model->workers),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
?>

<div class="project-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'customer_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\common\models\Customer::find()->orderBy('id')->asArray()->all(), 'id', 'fullname'),
        'options' => ['placeholder' => 'Choose Customer','disabled'=>true],
        'pluginOptions' => [
            'allowClear' => false
        ],
    ]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'placeholder' => 'Name','disabled'=>true]) ?>

    <?= $form->field($model, 'type')->textInput(['maxlength' => true, 'placeholder' => 'Type','disabled'=>true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6,'disabled'=>true]) ?>

    <?= $form->field($model, 'city_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\common\models\Cities::find()->orderBy('id')->asArray()->all(), 'id', 'name'),
        'options' => ['placeholder' => 'Choose Cities','disabled'=>true],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'address')->textarea(['rows' => 6,'disabled'=>true]) ?>
    <?php 
    if($model->status == 0){ ?>
    <?= $form->field($model, 'estimated_budget')->textInput(['maxlength' => true, 'placeholder' => 'Estimated Budget','disabled'=>true]) ?>

    <?= $form->field($model, 'fixed_budget')->textInput(['maxlength' => true, 'placeholder' => 'Fixed Budget']) ?>

    <?= $form->field($model, 'start')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose Start',
                'autoclose' => true
            ]
        ],
    ]); ?>
       
       <!--  else{ ?>


             }

        ?> -->
    <?= $form->field($model, 'finish')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose Finish',
                'autoclose' => true
            ]
        ],
    ]); ?>

         <?php }else{ ?>
          <?= $form->field($model, 'estimated_budget')->textInput(['maxlength' => true,'disabled'=>true, 'placeholder' => 'Estimated Budget','disabled'=>true]) ?>

    <?= $form->field($model, 'fixed_budget')->textInput(['maxlength' => true, 'disabled'=>true,'placeholder' => 'Fixed Budget']) ?>

    <?= $form->field($model, 'start')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'disabled'=>true,
            'pluginOptions' => [
                'placeholder' => 'Choose Start',
                'autoclose' => true,
               
            ]
        ],
    ]); ?>
       
       <!--  else{ ?>


             }

        ?> -->
    <?= $form->field($model, 'finish')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose Finish',
                'autoclose' => true,
                'disabled'=>true
            ]
        ],
    ]); ?>
    <?php }?>
     
    
    <?= $form->field($model, 'status',['template' => '{input}'])->textInput(['style' => 'display:none','value'=>1]) ?>
   
    <?php
    if($model->status == 1){
    $forms = [
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('Progress'),
            'content' => $this->render('_formProgress', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->progresses),
            ]),
        ],
    //     [
    //         'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('Worker'),
    //         'content' => $this->render('_formWorker', [
    //             'row' => \yii\helpers\ArrayHelper::toArray($model->workers),
    //         ]),
    //     ],
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
        }
    ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Accept', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Cancel'), Yii::$app->request->referrer , ['class'=> 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
