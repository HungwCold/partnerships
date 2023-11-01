<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Users;

/**
 * UsersSearch represents the model behind the search form of `app\models\Users`.
 */
class UsersSearch extends Users
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['uid', 'first_name', 'last_name', 'birthday', 'gender', 'email', 'middle_name', 'name', 'relationship_status', 'work', 'education', 'favorite_athletes', 'favorite_teams', 'hometown', 'languages', 'location', 'locale', 'interested_in', 'updated_at', 'created_at', 'religion', 'significant_other', 'username', 'verified', 'likes'], 'safe'],
            [['published_timeline'], 'integer'],
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
        $query = Users::find();

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
            'updated_at' => $this->updated_at,
            'created_at' => $this->created_at,
            'published_timeline' => $this->published_timeline,
        ]);

        $query->andFilterWhere(['like', 'uid', $this->uid])
            ->andFilterWhere(['like', 'first_name', $this->first_name])
            ->andFilterWhere(['like', 'last_name', $this->last_name])
            ->andFilterWhere(['like', 'birthday', $this->birthday])
            ->andFilterWhere(['like', 'gender', $this->gender])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'middle_name', $this->middle_name])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'relationship_status', $this->relationship_status])
            ->andFilterWhere(['like', 'work', $this->work])
            ->andFilterWhere(['like', 'education', $this->education])
            ->andFilterWhere(['like', 'favorite_athletes', $this->favorite_athletes])
            ->andFilterWhere(['like', 'favorite_teams', $this->favorite_teams])
            ->andFilterWhere(['like', 'hometown', $this->hometown])
            ->andFilterWhere(['like', 'languages', $this->languages])
            ->andFilterWhere(['like', 'location', $this->location])
            ->andFilterWhere(['like', 'locale', $this->locale])
            ->andFilterWhere(['like', 'interested_in', $this->interested_in])
            ->andFilterWhere(['like', 'religion', $this->religion])
            ->andFilterWhere(['like', 'significant_other', $this->significant_other])
            ->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'verified', $this->verified])
            ->andFilterWhere(['like', 'likes', $this->likes]);

        return $dataProvider;
    }
}
