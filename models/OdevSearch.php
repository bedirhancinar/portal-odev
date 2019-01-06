<?php

namespace kouosl\odev\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use kouosl\odev\models\Odev;

/**
 * OdevSearch represents the model behind the search form of `vendor\kouosl\odev\models\Odev`.
 */
class OdevSearch extends Odev
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'userid', 'categoryid'], 'integer'],
            [['title', 'content', 'status', 'startdate', 'enddate', 'modified'], 'safe'],
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
        $query = Odev::find();

        // ->where(['between', 'enddate', 'startdate', date('Y-m-d h:m:s')  ])->where(['between', 'enddate',  date('Y-m-d h:m:s') ,'enddate'- '0-0-0 0:0:1'  ])

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
            'userid' => $this->userid,
            'categoryid' => $this->categoryid,
            'startdate' => $this->startdate,
            'enddate' => $this->enddate,
            'modified' => $this->modified,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
