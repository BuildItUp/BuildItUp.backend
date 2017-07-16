<?php

namespace common\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "worker".
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
 * @property \common\models\BudgetLog[] $budgetLogs
 * @property \common\models\CashFlow[] $cashFlows
 * @property \common\models\Colleagues[] $colleagues
 * @property \common\models\CoveredLoc[] $coveredLocs
 * @property \common\models\Project $project
 * @property \common\models\User $user
 * @property \common\models\Cities $city
 * @property \common\models\Specialization $specialization
 * @property \common\models\WorkerContacts[] $workerContacts
 */
class Worker extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

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
            [['email'], 'unique']
        ];
    }
    
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
        return $this->hasMany(\common\models\BudgetLog::className(), ['worker_id' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCashFlows()
    {
        return $this->hasMany(\common\models\CashFlow::className(), ['worker_id' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getColleagues()
    {
        return $this->hasMany(\common\models\Colleagues::className(), ['worker_id' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCoveredLocs()
    {
        return $this->hasMany(\common\models\CoveredLoc::className(), ['worker_id' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProject()
    {
        return $this->hasOne(\common\models\Project::className(), ['id' => 'project_id']);
    }
     public function getProjectWorker($id)
    {
        
        return $this->hasOne(\common\models\Project::className(), [$id => 'project_id']);
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
    public function getSpecialization()
    {
        return $this->hasOne(\common\models\Specialization::className(), ['id' => 'specialization_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWorkerContacts()
    {
        return $this->hasMany(\common\models\WorkerContacts::className(), ['worker_id' => 'id']);
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
            // ],
            // 'blameable' => [
            //     'class' => BlameableBehavior::className(),
            //     'createdByAttribute' => 'created_by',
            //     'updatedByAttribute' => 'updated_by',
            // ],
            'uuid' => [
                'class' => UUIDBehavior::className(),
                'column' => 'id',
            ],
        ];
    }

    /**
     * @inheritdoc
     * @return \common\models\WorkerQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\WorkerQuery(get_called_class());
    }
    public function updateProject ($id,$pid)
    {
        $query=Worker::find()->where('user_id'==$id);
        $query->project_id = $pid;
        $qury->save();
    }
}
