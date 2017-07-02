<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[Colleagues]].
 *
 * @see Colleagues
 */
class ColleaguesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Colleagues[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Colleagues|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}