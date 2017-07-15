<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[BudgetLog]].
 *
 * @see BudgetLog
 */
class BudgetLogQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return BudgetLog[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return BudgetLog|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}