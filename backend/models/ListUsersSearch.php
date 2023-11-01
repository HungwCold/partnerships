<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ListUsers;

/**
 * ListUsersSearch represents the model behind the search form of `app\models\ListUsers`.
 */
class ListUsersSearch extends ListUsers
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'sex', 'id_user_type', 'role_id', 'bonus_point', 'setting_notification'], 'integer'],
            [['firstName', 'lastName', 'username', 'email', 'birthday', 'password', 'list_users_hotel', 'address', 'country', 'city', 'bank_account_number', 'passport', 'passport_date', 'passport_place', 'noted', 'status', 'status_confirmed', 'phone_number', 'social_id', 'token_device', 'system', 'facebook_token', 'google_token', 'remember_token', 'created_at', 'updated_at', 'last_login'], 'safe'],
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
        $query = ListUsers::find();
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
            'sex' => $this->sex,
            'birthday' => $this->birthday,
            'id_user_type' => $this->id_user_type,
            'role_id' => $this->role_id,
            'bonus_point' => $this->bonus_point,
            'setting_notification' => $this->setting_notification,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'last_login' => $this->last_login,
        ]);

        $query->andFilterWhere(['like', 'firstName', $this->firstName])
            ->andFilterWhere(['like', 'lastName', $this->lastName])
            ->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'password', $this->password])
            ->andFilterWhere(['like', 'list_users_hotel', Yii::$app->user->id])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'country', $this->country])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'bank_account_number', $this->bank_account_number])
            ->andFilterWhere(['like', 'passport', $this->passport])
            ->andFilterWhere(['like', 'passport_date', $this->passport_date])
            ->andFilterWhere(['like', 'passport_place', $this->passport_place])
            ->andFilterWhere(['like', 'noted', $this->noted])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'status_confirmed', $this->status_confirmed])
            ->andFilterWhere(['like', 'phone_number', $this->phone_number])
            ->andFilterWhere(['like', 'social_id', $this->social_id])
            ->andFilterWhere(['like', 'token_device', $this->token_device])
            ->andFilterWhere(['like', 'system', $this->system])
            ->andFilterWhere(['like', 'facebook_token', $this->facebook_token])
            ->andFilterWhere(['like', 'google_token', $this->google_token])
            ->andFilterWhere(['like', 'remember_token', $this->remember_token]);

        return $dataProvider;
    }
}
