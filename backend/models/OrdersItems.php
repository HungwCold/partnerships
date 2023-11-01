<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "orders_items".
 *
 * @property int $id
 * @property string $id_order
 * @property string $id_service
 * @property int $quantity
 * @property string $price
 */
class OrdersItems extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'orders_items';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_order', 'id_service', 'quantity', 'price'], 'required'],
            [['quantity'], 'integer'],
            [['id_order', 'id_service'], 'string', 'max' => 50],
            [['price'], 'string', 'max' => 11],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_order' => 'Id Order',
            'id_service' => 'Id Service',
            'quantity' => 'Quantity',
            'price' => 'Price',
        ];
    }

    /**
     * {@inheritdoc}
     * @return OrdersItemsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new OrdersItemsQuery(get_called_class());
    }
}
