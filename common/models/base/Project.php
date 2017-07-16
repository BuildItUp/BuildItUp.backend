<?php

namespace common\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "project".
 *
 * @property integer $id
 * @property integer $customer_id
 * @property string $name
 * @property string $type
 * @property string $description
 * @property integer $city_id
 * @property string $address
 * @property string $estimated_budget
 * @property string $fixed_budget
 * @property string $start
 * @property string $finish
 *
 * @property \common\models\Progress[] $progresses
 * @property \common\models\Customer $customer
 * @property \common\models\Cities $city
 * @property \common\models\Worker[] $workers
 */
class Project extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['customer_id', 'city_id', 'estimated_budget', 'fixed_budget'], 'integer'],
            [['description', 'address'], 'string'],
            [['city_id', 'address'], 'required'],
            [['start', 'finish'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['type'], 'string', 'max' => 50],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'project';
    }

    /**
     * 
     * @return string
     * overwrite function optimisticLock
     * return string name of field are used to stored optimistic lock 
     * 
     */
    public function optimisticLock() {
        return 'lock';
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
            'city_id' => 'City ID',
            'address' => 'Address',
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
        return $this->hasMany(\common\models\Progress::className(), ['project_id' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(\common\models\Customer::className(), ['id' => 'customer_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCity()
    {
        return $this->hasOne(\common\models\Cities::className(), ['id' => 'city_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWorkers()
    {
        return $this->hasMany(\common\models\Worker::className(), ['project_id' => 'id']);
    }
    
/**
     * @inheritdoc
     * @return array mixed
     */ 
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new \yii\db\Expression('NOW()'),
            ],
            'blameable' => [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'created_by',
                'updatedByAttribute' => 'updated_by',
            ],
            'uuid' => [
                'class' => UUIDBehavior::className(),
                'column' => 'id',
            ],
        ];
    }

    /**
     * @inheritdoc
     * @return \app\models\ProjectQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\ProjectQuery(get_called_class());
    }
}
