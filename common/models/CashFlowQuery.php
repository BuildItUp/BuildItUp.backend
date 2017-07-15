<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[CashFlow]].
 *
 * @see CashFlow
 */
class CashFlowQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return CashFlow[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return CashFlow|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}