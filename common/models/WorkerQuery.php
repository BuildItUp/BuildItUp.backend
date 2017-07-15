<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[Worker]].
 *
 * @see Worker
 */
class WorkerQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Worker[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Worker|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}