<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Worker;
/* @var $this yii\web\View */
/* @var $model common\models\CashFlow */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="cash-flow-form">
    <?php $worker=Worker::findOne(['user_id' => Yii::$app->user->identity->id]); ?>
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

  <!--  -->

    <?= $form->field($model, 'worker_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\common\models\Worker::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
        'options' => ['placeholder' => 'Choose Worker',],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'date')->textInput(['placeholder' => 'Date']) ?>

    <?= $form->field($model, 'amount')->textInput(['maxlength' => true, 'placeholder' => 'Amount']) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'to_budget')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Cancel'), Yii::$app->request->referrer , ['class'=> 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
