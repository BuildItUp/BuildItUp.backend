<?php

namespace common\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "customer".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $city_id
 * @property string $fullname
 * @property string $citizen_id
 * @property string $photo_path
 * @property string $address
 * @property string $phone_number
 * @property string $email
 * @property string $budget
 *
 * @property \common\models\BudgetLog[] $budgetLogs
 * @property \common\models\CashFlow[] $cashFlows
 * @property \common\models\User $user
 * @property \common\models\Cities $city
 * @property \common\models\Project[] $projects
 * @property \common\models\WorkerContacts[] $workerContacts
 */
class Customer extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id', 'city_id', 'budget'], 'integer'],
            [['fullname', 'photo_path', 'address', 'email'], 'string', 'max' => 255],
            [['citizen_id'], 'string', 'max' => 50],
            [['phone_number'], 'string', 'max' => 20],
            [['email'], 'unique'],
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'customer';
    }

    /**
     * 
     * @return string
     * overwrite function optimisticLock
     * return string name of field are used to stored optimistic lock 
     * 
     */
    // public function optimisticLock() {
    //     return 'lock';
    // }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'city_id' => 'City ID',
            'fullname' => 'Fullname',
            'citizen_id' => 'Citizen ID',
            'photo_path' => 'Photo Path',
            'address' => 'Address',
            'phone_number' => 'Phone Number',
            'email' => 'Email',
            'budget' => 'Budget',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBudgetLogs()
    {
        return $this->hasMany(\common\models\BudgetLog::className(), ['customer_id' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCashFlows()
    {
        return $this->hasMany(\common\models\CashFlow::className(), ['customer_id' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(\common\models\User::className(), ['id' => 'user_id']);
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
    public function getProjects()
    {
        return $this->hasMany(\common\models\Project::className(), ['customer_id' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWorkerContacts()
    {
        return $this->hasMany(\common\models\WorkerContacts::className(), ['customer_id' => 'id']);
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
     * @return \common\models\CustomerQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\CustomerQuery(get_called_class());
    }
}
