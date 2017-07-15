<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[\app\models\Worker]].
 *
 * @see \app\models\Worker
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
     * @return \app\models\Worker[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\models\Worker|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}