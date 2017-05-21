<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "worker".
 *
 * @property integer $id
 * @property integer $project_id
 * @property integer $user_id
 * @property integer $city_id
 * @property integer $specialization_id
 * @property string $fullname
 * @property string $citizen_id
 * @property string $birthdate
 * @property string $photo_path
 * @property string $address
 * @property string $phone_number
 * @property string $email
 * @property string $graduate
 * @property string $graduate_date
 * @property double $avg_rating
 * @property string $personal_budget
 * @property string $project_budget
 * @property integer $status
 *
 * @property BudgetLog[] $budgetLogs
 * @property CashFlow[] $cashFlows
 * @property Colleagues[] $colleagues
 * @property Colleagues[] $colleagues0
 * @property CoveredLoc[] $coveredLocs
 * @property Project $project
 * @property User $user
 * @property Cities $city
 * @property Specialization $specialization
 * @property WorkerContacts[] $workerContacts
 */
class Worker extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'worker';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['project_id', 'user_id', 'city_id', 'specialization_id', 'personal_budget', 'project_budget', 'status'], 'integer'],
            [['user_id'], 'required'],
            [['birthdate', 'graduate_date'], 'safe'],
            [['avg_rating'], 'number'],
            [['fullname', 'photo_path', 'address', 'email', 'graduate'], 'string', 'max' => 255],
            [['citizen_id'], 'string', 'max' => 50],
            [['phone_number'], 'string', 'max' => 20],
            [['email'], 'unique'],
            [['project_id'], 'exist', 'skipOnError' => true, 'targetClass' => Project::className(), 'targetAttribute' => ['project_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['city_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cities::className(), 'targetAttribute' => ['city_id' => 'id']],
            [['specialization_id'], 'exist', 'skipOnError' => true, 'targetClass' => Specialization::className(), 'targetAttribute' => ['specialization_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'project_id' => 'Project ID',
            'user_id' => 'User ID',
            'city_id' => 'City ID',
            'specialization_id' => 'Specialization ID',
            'fullname' => 'Fullname',
            'citizen_id' => 'Citizen ID',
            'birthdate' => 'Birthdate',
            'photo_path' => 'Photo Path',
            'address' => 'Address',
            'phone_number' => 'Phone Number',
            'email' => 'Email',
            'graduate' => 'Graduate',
            'graduate_date' => 'Graduate Date',
            'avg_rating' => 'Avg Rating',
            'personal_budget' => 'Personal Budget',
            'project_budget' => 'Project Budget',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBudgetLogs()
    {
        return $this->hasMany(BudgetLog::className(), ['worker_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCashFlows()
    {
        return $this->hasMany(CashFlow::className(), ['worker_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getColleagues()
    {
        return $this->hasMany(Colleagues::className(), ['wor_worker_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getColleagues0()
    {
        return $this->hasMany(Colleagues::className(), ['worker_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCoveredLocs()
    {
        return $this->hasMany(CoveredLoc::className(), ['worker_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProject()
    {
        return $this->hasOne(Project::className(), ['id' => 'project_id']);
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
    public function getSpecialization()
    {
        return $this->hasOne(Specialization::className(), ['id' => 'specialization_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWorkerContacts()
    {
        return $this->hasMany(WorkerContacts::className(), ['worker_id' => 'id']);
    }
}
