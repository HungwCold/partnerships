<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Orders;

/**
 * OrdersSearch represents the model behind the search form of `app\models\Orders`.
 */
class OrdersSearch extends Orders
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'hotel_id', 'room_id', 'status', 'status_payment', 'bonus_point', 'time_meet'], 'integer'],
            [['total_price'], 'number'],
            [['order_number', 'email', 'phone_number', 'check_in', 'check_out', 'created_at', 'updated_at'], 'safe'],
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
        $query = Orders::find()->where(['hotel_id' => Yii::$app->user->id]);

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
            'user_id' => $this->user_id,
            'hotel_id' => $this->hotel_id,
            'room_id' => $this->room_id,
            'total_price' => $this->total_price,
            'status' => $this->status,
            'status_payment' => $this->status_payment,
            'bonus_point' => $this->bonus_point,
            'time_meet' => $this->time_meet,
            'check_in' => $this->check_in,
            'check_out' => $this->check_out,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'order_number', $this->order_number])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'phone_number', $this->phone_number]);

        return $dataProvider;
    }

    public function searchStatus($params, $status)
    {
        // $hotel_id = Yii::$app->user->id;
        // var_dump($hotel_id);
        // die;
        $query = Orders::find()->where(['hotel_id' => Yii::$app->user->id, 'status' => $status]);

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
            'user_id' => $this->user_id,
            'hotel_id' => $this->hotel_id,
            'room_id' => $this->room_id,
            'total_price' => $this->total_price,
            'status' => $this->status,
            'status_payment' => $this->status_payment,
            'bonus_point' => $this->bonus_point,
            'time_meet' => $this->time_meet,
            'check_in' => $this->check_in,
            'check_out' => $this->check_out,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'order_number', $this->order_number])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'phone_number', $this->phone_number]);

        return $dataProvider;
    }
}
