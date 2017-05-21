<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "project".
 *
 * @property integer $id
 * @property integer $customer_id
 * @property string $name
 * @property string $type
 * @property string $description
 * @property string $estimated_budget
 * @property string $fixed_budget
 * @property string $start
 * @property string $finish
 *
 * @property Progress[] $progresses
 * @property Customer $customer
 * @property Worker[] $workers
 */
class Project extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'project';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['customer_id', 'estimated_budget', 'fixed_budget'], 'integer'],
            [['description'], 'string'],
            [['start', 'finish'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['type'], 'string', 'max' => 50],
            [['customer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Customer::className(), 'targetAttribute' => ['customer_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'customer_id' => 'Customer ID',
            'name' => 'Name',
            'type' => 'Type',
            'description' => 'Description',
            'estimated_budget' => 'Estimated Budget',
            'fixed_budget' => 'Fixed Budget',
            'start' => 'Start',
            'finish' => 'Finish',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProgresses()
    {
        return $this->hasMany(Progress::className(), ['project_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(Customer::className(), ['id' => 'customer_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWorkers()
    {
        return $this->hasMany(Worker::className(), ['project_id' => 'id']);
    }
}
