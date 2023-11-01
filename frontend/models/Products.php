<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property int $id
 * @property string $name
 * @property string $images
 * @property string $description
 * @property float $price
 * @property string $status
 * @property int $stock
 * @property string $policy
 * @property string $shipping_fee
 * @property float|null $sale_off
 * @property int $category_id
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['images', 'description', 'status', 'stock', 'policy', 'shipping_fee', 'category_id'], 'required'],
            [['description'], 'string'],
            [['price', 'sale_off'], 'number'],
            [['stock', 'category_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'images'], 'string', 'max' => 255],
            [['status', 'shipping_fee'], 'string', 'max' => 20],
            [['policy'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'images' => 'Images',
            'description' => 'Description',
            'price' => 'Price',
            'status' => 'Status',
            'stock' => 'Stock',
            'policy' => 'Policy',
            'shipping_fee' => 'Shipping Fee',
            'sale_off' => 'Sale Off',
            'category_id' => 'Category ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * {@inheritdoc}
     * @return ProductsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProductsQuery(get_called_class());
    }
}
