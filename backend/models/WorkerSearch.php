<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Worker;

/**
 * app\models\WorkerSearch represents the model behind the search form about `common\models\Worker`.
 */
 class WorkerSearch extends Worker
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'project_id', 'user_id', 'city_id', 'specialization_id', 'personal_budget', 'project_budget', 'status'], 'integer'],
            [['fullname', 'citizen_id', 'birthdate', 'photo_path', 'address', 'phone_number', 'email', 'graduate', 'graduate_date'], 'safe'],
            [['avg_rating'], 'number'],
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
        $query = Worker::find();

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
            'project_id' => $this->project_id,
            'user_id' => $this->user_id,
            'city_id' => $this->city_id,
            'specialization_id' => $this->specialization_id,
            'birthdate' => $this->birthdate,
            'graduate_date' => $this->graduate_date,
            'avg_rating' => $this->avg_rating,
            'personal_budget' => $this->personal_budget,
            'project_budget' => $this->project_budget,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'fullname', $this->fullname])
            ->andFilterWhere(['like', 'citizen_id', $this->citizen_id])
            ->andFilterWhere(['like', 'photo_path', $this->photo_path])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'phone_number', $this->phone_number])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'graduate', $this->graduate]);

        return $dataProvider;
    }
}
