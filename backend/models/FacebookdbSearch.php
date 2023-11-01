<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Facebookdb;

/**
 * FacebookdbSearch represents the model behind the search form of `app\models\Facebookdb`.
 */
class FacebookdbSearch extends Facebookdb
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['uid', 'name', 'phone', 'comment', 'created_at', 'updated_at'], 'safe'],
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
        $query = Facebookdb::find();

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
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'uid', $this->uid])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'comment', $this->comment]);

        return $dataProvider;
    }

    public function searchExport($params)
    {
        $query = Facebookdb::find()->select(['name','phone']);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination'=>false,
        ]);
        $this->load($params);
        if (!$this->validate()) {
            return $dataProvider;
        }
        $query->andWhere(['!=', 'phone', 'None'])
            ->andFilterWhere(['like', 'comment', $this->comment]);

        return $dataProvider;
    }

    public function searchExportPhone($params)
    {
        $query = Facebookdb::find()->select(['phone']);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination'=>false,
        ]);
        $this->load($params);
        if (!$this->validate()) {
            return $dataProvider;
        }
        $query->andWhere(['!=', 'phone', 'None'])
              ->andFilterWhere(['like', 'comment', $this->comment]);

        return $dataProvider;
    }
}
