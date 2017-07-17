<?php

namespace common\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "budget_log".
 *
 * @property integer $id
 * @property integer $worker_id
 * @property integer $customer_id
 * @property string $date
 * @property string $action
 * @property string $amount
 * @property string $token
 *
 * @property \common\models\Worker $worker
 * @property \common\models\Customer $customer
 */
class BudgetLog extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['worker_id', 'customer_id', 'amount'], 'integer'],
            [['date'], 'safe'],
            [['action'], 'string', 'max' => 255],
            [['token'], 'string', 'max' => 25],
           
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'budget_log';
    }

    /**
     * 
     * @return string
     * overwrite function optimisticLock
     * return string name of field are used to stored optimistic lock 
     * 
  
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'worker_id' => 'Worker ID',
            'customer_id' => 'Customer ID',
            'date' => 'Date',
            'action' => 'Action',
            'amount' => 'Amount',
            'token' => 'Token',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWorker()
    {
        return $this->hasOne(\common\models\Worker::className(), ['id' => 'worker_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(\common\models\Customer::className(), ['id' => 'customer_id']);
    }
    
/**
     * @inheritdoc
     * @return array mixed
     */ 
    public function behaviors()
    {
        return [
            // 'timestamp' => [
            //     'class' => TimestampBehavior::className(),
            //     'createdAtAttribute' => 'created_at',
            //     'updatedAtAttribute' => 'updated_at',
            //     'value' => new \yii\db\Expression('NOW()'),
            // ],
            // 'blameable' => [
            //     'class' => BlameableBehavior::className(),
            //     'createdByAttribute' => 'created_by',
            //     'updatedByAttribute' => 'updated_by',
            // ],
            // 'uuid' => [
            //     'class' => UUIDBehavior::className(),
            //     'column' => 'id',
            // ],
        ];
    }

    /**
     * @inheritdoc
     * @return \common\models\BudgetLogQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\BudgetLogQuery(get_called_class());
    }
}
