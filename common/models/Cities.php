<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cities".
 *
 * @property integer $id
 * @property integer $provinces_id
 * @property string $name
 *
 * @property Provinces $provinces
 * @property CoveredLoc[] $coveredLocs
 * @property Customer[] $customers
 * @property Worker[] $workers
 */
class Cities extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cities';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['provinces_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['provinces_id'], 'exist', 'skipOnError' => true, 'targetClass' => Provinces::className(), 'targetAttribute' => ['provinces_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'provinces_id' => 'Provinces ID',
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProvinces()
    {
        return $this->hasOne(Provinces::className(), ['id' => 'provinces_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCoveredLocs()
    {
        return $this->hasMany(CoveredLoc::className(), ['city_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomers()
    {
        return $this->hasMany(Customer::className(), ['city_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWorkers()
    {
        return $this->hasMany(Worker::className(), ['city_id' => 'id']);
    }
}
