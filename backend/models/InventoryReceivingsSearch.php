<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\InventoryReceivings;

/**
 * InventoryReceivingsSearch represents the model behind the search form of `app\models\InventoryReceivings`.
 */
class InventoryReceivingsSearch extends InventoryReceivings
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'hotel_id', 'warehouse_id', 'supplier_id', 'money_fund_id', 'subusers_id', 'discount', 'value_added_tax', 'status'], 'integer'],
            [['code_receiving', 'total_money', 'final_settlement', 'has_paid', 'products', 'note', 'created_at', 'updated_at'], 'safe'],
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
        $query = InventoryReceivings::find();

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
            'hotel_id' => $this->hotel_id,
            'warehouse_id' => $this->warehouse_id,
            'supplier_id' => $this->supplier_id,
            'money_fund_id' => $this->money_fund_id,
            'subusers_id' => $this->subusers_id,
            'discount' => $this->discount,
            'value_added_tax' => $this->value_added_tax,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'code_receiving', $this->code_receiving])
            ->andFilterWhere(['like', 'total_money', $this->total_money])
            ->andFilterWhere(['like', 'final_settlement', $this->final_settlement])
            ->andFilterWhere(['like', 'has_paid', $this->has_paid])
            ->andFilterWhere(['like', 'products', $this->products])
            ->andFilterWhere(['like', 'note', $this->note]);

        return $dataProvider;
    }
}
