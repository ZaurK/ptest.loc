<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Result;

/**
 * ResultSearch represents the model behind the search form of `app\models\Result`.
 */
class ResultSearch extends Result
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['result', 'id_user',  'id_quiz'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Result::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->joinWith('quizBond');
        $query->joinWith('userBond');

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            // 'id_user' => $this->id_user,
            // 'id_quiz' => $this->id_quiz,
        ]);

        $query->andFilterWhere(['like', 'result', $this->result])
              ->andFilterWhere(['like', 'quiz.quiztitle', $this->id_quiz])
              ->andFilterWhere(['like', 'user.fio', $this->id_user]);

        return $dataProvider;
    }
}
