<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "customer".
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
 * @property BudgetLog[] $budgetLogs
 * @property CashFlow[] $cashFlows
 * @property User $user
 * @property Cities $city
 * @property Project[] $projects
 * @property WorkerContacts[] $workerContacts
 */
class Customer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'customer';
    }

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
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['city_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cities::className(), 'targetAttribute' => ['city_id' => 'id']],
        ];
    }

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
        return $this->hasMany(BudgetLog::className(), ['customer_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCashFlows()
    {
        return $this->hasMany(CashFlow::className(), ['customer_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCity()
    {
        return $this->hasOne(Cities::className(), ['id' => 'city_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjects()
    {
        return $this->hasMany(Project::className(), ['customer_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWorkerContacts()
    {
        return $this->hasMany(WorkerContacts::className(), ['customer_id' => 'id']);
    }
}
