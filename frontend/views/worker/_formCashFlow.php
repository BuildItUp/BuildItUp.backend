<div class="form-group" id="add-cash-flow">
<?php
use kartik\grid\GridView;
use kartik\builder\TabularForm;
use yii\data\ArrayDataProvider;
use yii\helpers\Html;
use yii\widgets\Pjax;

$dataProvider = new ArrayDataProvider([
    'allModels' => $row,
    'pagination' => [
        'pageSize' => -1
    ]
]);
echo TabularForm::widget([
    'dataProvider' => $dataProvider,
    'formName' => 'CashFlow',
    'checkboxColumn' => false,
    'actionColumn' => false,
    'attributeDefaults' => [
        'type' => TabularForm::INPUT_TEXT,
    ],
    'attributes' => [
        "id" => ['type' => TabularForm::INPUT_HIDDEN, 'columnOptions' => ['hidden'=>true]],
        'customer_id' => [
            'label' => 'Customer',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\common\models\Customer::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
                'options' => ['placeholder' => 'Choose Customer'],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'date' => ['type' => TabularForm::INPUT_TEXT],
        'amount' => ['type' => TabularForm::INPUT_TEXT],
        'description' => ['type' => TabularForm::INPUT_TEXTAREA],
        'to_budget' => ['type' => TabularForm::INPUT_CHECKBOX,
            'options' => [
                'style' => 'position : relative; margin-top : -9px'
            ]
        ],
        'del' => [
            'type' => 'raw',
            'label' => '',
            'value' => function($model, $key) {
                return
                    Html::hiddenInput('Children[' . $key . '][id]', (!empty($model['id'])) ? $model['id'] : "") .
                    Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', ['title' =>  'Delete', 'onClick' => 'delRowCashFlow(' . $key . '); return false;', 'id' => 'cash-flow-del-btn']);
            },
        ],
    ],
    'gridSettings' => [
        'panel' => [
            'heading' => false,
            'type' => GridView::TYPE_DEFAULT,
            'before' => false,
            'footer' => false,
            'after' => Html::button('<i class="glyphicon glyphicon-plus"></i>' . 'Add Cash Flow', ['type' => 'button', 'class' => 'btn btn-success kv-batch-create', 'onClick' => 'addRowCashFlow()']),
        ]
    ]
]);
echo  "    </div>\n\n";
?>

