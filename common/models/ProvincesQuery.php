<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[Provinces]].
 *
 * @see Provinces
 */
class ProvincesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Provinces[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Provinces|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}