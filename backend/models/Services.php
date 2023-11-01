<?php

namespace app\models;

use Yii;
use app\models\ProductUnit;

/**
 * This is the model class for table "services".
 *
 * @property int $id
 * @property int $hotel_id
 * @property int $product_unit_id
 * @property string $name
 * @property string $price_import
 * @property string $price_export
 * @property string $note
 * @property int $status 1 => active, 2 => unactive
 * @property string $created_at
 * @property string $updated_at
 */
class Services extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'services';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['hotel_id', 'product_unit_id', 'name', 'price_import', 'price_export', 'note'], 'required'],
            [['hotel_id', 'product_unit_id', 'status'], 'integer'],
            [['note'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 50],
            [['price_import', 'price_export'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'hotel_id' => 'Hotel ID',
            'product_unit_id' => 'Đơn vị tính',
            'name' => 'Tên dịch vụ',
            'price_import' => 'Giá gốc',
            'price_export' => 'Giá bán',
            'note' => 'Ghi chú',
            'status' => 'Trạng thái',
            'created_at' => 'Ngày tạo',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * {@inheritdoc}
     * @return ServicesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ServicesQuery(get_called_class());
    }

    public function getProductUnit($id)
    {
        return ProductUnit::findOne($id);
    }

    public static function formatPrice($priceFloat) {
        $symbol = 'đ';
        $symbol_thousand = '.';
        $decimal_place = 0;
        $price = number_format($priceFloat, $decimal_place, '', $symbol_thousand);
        return $price.$symbol;
    }
}
