<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Worker;
use kartik\widgets\SwitchInput;
/* @var $this yii\web\View */
/* @var $model common\models\BudgetLog */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="budget-log-form">
   
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?php
    // $form->field($model, 'worker_id')->widget(\kartik\widgets\Select2::classname(), [
    //     'data' => \yii\helpers\ArrayHelper::map(\common\models\Worker::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
    //     'options' => ['placeholder' => 'Choose Worker',
    //                   'style' => 'display:none',
    //                  ],
    //     'pluginOptions' => [
    //         'allowClear' => true,
    //         'value' => $worker->id,
    //         'disabled'=>true,

    //     ],  
    // ]); 
    ?>


    <?php
     // $form->field($model, 'date')->textInput(['placeholder' => 'Date']) 
     ?>

    <?= $form->field($model, 'action')->textInput(['maxlength' => true, 'placeholder' => 'Action','value'=>'Withdraw','disabled'=>true]) ?>
    
    <?= $form->field($model, 'amount')->textInput(['maxlength' => true, 'placeholder' => 'Amount']) ?>
     <?= Yii::$app->session->getFlash('error'); ?>
    <?php 
    // $form->field($model, 'token')->textInput(['maxlength' => true, 'placeholder' => 'Token']) 
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Cancel'), Yii::$app->request->referrer , ['class'=> 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
