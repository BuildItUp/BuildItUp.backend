<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\CashFlow;
use common\models\Worker;
/**
 * common\models\CashFlowSearch represents the model behind the search form about `common\models\CashFlow`.
 */
 class CashFlowSearch extends CashFlow
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'customer_id', 'worker_id', 'amount', 'to_budget'], 'integer'],
            [['date', 'description'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $worker = Worker::findOne(['user_id'=>Yii::$app->user->identity->id]);
        $query = CashFlow::find()->where(['worker_id'=>$worker->id]);
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'customer_id' => $this->customer_id,
            'worker_id' => $this->worker_id,
            'date' => $this->date,
            'amount' => $this->amount,
            'to_budget' => $this->to_budget,
        ]);

        $query->andFilterWhere(['like', 'description', $this->description]);
            

        return $dataProvider;
    }
}
