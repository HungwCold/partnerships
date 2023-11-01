<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SubusersHotel;

/**
 * SubusersHotelSearch represents the model behind the search form of `app\models\SubusersHotel`.
 */
class SubusersHotelSearch extends SubusersHotel
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'hotel_id', 'sex', 'position_id', 'status'], 'integer'],
            [['username', 'password', 'email', 'birthday', 'phone_number', 'created_at', 'updated_at', 'employee_code' ], 'safe'],
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
        $query = SubusersHotel::find();

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
            'hotel_id' => Yii::$app->user->id,
            'sex' => $this->sex,
            'birthday' => $this->birthday,
            'position_id' => $this->position_id,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'password', $this->password])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'phone_number', $this->phone_number]);

        return $dataProvider;
    }
}
