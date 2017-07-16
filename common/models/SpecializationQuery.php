<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[Specialization]].
 *
 * @see Specialization
 */
class SpecializationQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Specialization[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Specialization|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}