<div class="form-group" id="add-worker">
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
    'formName' => 'Worker',
    'checkboxColumn' => false,
    'actionColumn' => false,
    'attributeDefaults' => [
        'type' => TabularForm::INPUT_TEXT,
    ],
    'attributes' => [
        "id" => ['type' => TabularForm::INPUT_HIDDEN, 'visible' => false],
        'user_id' => [
            'label' => 'User',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\common\models\User::find()->orderBy('username')->asArray()->all(), 'id', 'username'),
                'options' => ['placeholder' => 'Choose User'],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'city_id' => [
            'label' => 'Cities',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\common\models\Cities::find()->orderBy('name')->asArray()->all(), 'id', 'name'),
                'options' => ['placeholder' => 'Choose Cities'],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'specialization_id' => [
            'label' => 'Specialization',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\common\models\Specialization::find()->orderBy('name')->asArray()->all(), 'id', 'name'),
                'options' => ['placeholder' => 'Choose Specialization'],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'fullname' => ['type' => TabularForm::INPUT_TEXT],
        'citizen_id' => ['type' => TabularForm::INPUT_TEXT],
        'birthdate' => ['type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\datecontrol\DateControl::classname(),
            'options' => [
                'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
                'saveFormat' => 'php:Y-m-d',
                'ajaxConversion' => true,
                'options' => [
                    'pluginOptions' => [
                        'placeholder' => 'Choose Birthdate',
                        'autoclose' => true
                    ]
                ],
            ]
        ],
        'photo_path' => ['type' => TabularForm::INPUT_TEXT],
        'address' => ['type' => TabularForm::INPUT_TEXT],
        'phone_number' => ['type' => TabularForm::INPUT_TEXT],
        'email' => ['type' => TabularForm::INPUT_TEXT],
        'graduate' => ['type' => TabularForm::INPUT_TEXT],
        'graduate_date' => ['type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\datecontrol\DateControl::classname(),
            'options' => [
                'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
                'saveFormat' => 'php:Y-m-d',
                'ajaxConversion' => true,
                'options' => [
                    'pluginOptions' => [
                        'placeholder' => 'Choose Graduate Date',
                        'autoclose' => true
                    ]
                ],
            ]
        ],
        'avg_rating' => ['type' => TabularForm::INPUT_TEXT],
        'personal_budget' => ['type' => TabularForm::INPUT_TEXT],
        'project_budget' => ['type' => TabularForm::INPUT_TEXT],
        'status' => ['type' => TabularForm::INPUT_CHECKBOX,
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
                    Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', ['title' =>  'Delete', 'onClick' => 'delRowWorker(' . $key . '); return false;', 'id' => 'worker-del-btn']);
            },
        ],
    ],
    'gridSettings' => [
        'panel' => [
            'heading' => false,
            'type' => GridView::TYPE_DEFAULT,
            'before' => false,
            'footer' => false,
            'after' => Html::button('<i class="glyphicon glyphicon-plus"></i>' . 'Add Worker', ['type' => 'button', 'class' => 'btn btn-success kv-batch-create', 'onClick' => 'addRowWorker()']),
        ]
    ]
]);
echo  "    </div>\n\n";
?>

