<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Page;

/**
 * PageSearch represents the model behind the search form of `app\models\Page`.
 */
class PageSearch extends Page
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_parent', 'page_num', 'access'], 'integer'],
            [['page_title', 'page_content'], 'safe'],
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
        $query = Page::find();

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

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'id_parent' => $this->id_parent,
            // 'page_title' => $this->page_title,
            'page_num' => $this->page_num,
            'access' => $this->access,
        ]);

        $query->andFilterWhere(['like', 'page_title', $this->page_title])
            ->andFilterWhere(['like', 'page_content', $this->page_content])
            ->andFilterWhere(['like', 'id_parent', $this->id_parent])
            ->andFilterWhere(['like', 'access', $this->access]);

        return $dataProvider;
    }
}
