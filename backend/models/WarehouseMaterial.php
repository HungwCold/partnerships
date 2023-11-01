<?php

namespace app\models;

use Yii;
use app\models\WareHouse;
use app\models\ProductUnit;
use app\models\GroupFood;

/**
 * This is the model class for table "warehouse_material".
 *
 * @property int $id
 * @property int $warehouse_id
 * @property int $group_food_id
 * @property int $product_unit_id
 * @property string $name
 * @property string $price_import
 * @property string $price_export
 * @property int $stock
 * @property string $created_at
 * @property string $updated_at
 */
class WarehouseMaterial extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'warehouse_material';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['warehouse_id', 'group_food_id', 'product_unit_id', 'name', 'price_import', 'price_export', 'stock'], 'required'],
            [['warehouse_id', 'group_food_id', 'product_unit_id', 'stock'], 'integer'],
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
            'warehouse_id' => 'Tên kho chứa',
            'group_food_id' => 'Loại',
            'product_unit_id' => 'Đơn vị tính',
            'name' => 'Tên nguyên liệu',
            'price_import' => 'Giá nhập',
            'price_export' => 'Giá xuất',
            'stock' => 'Số lượng',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * {@inheritdoc}
     * @return WarehouseMaterialQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new WarehouseMaterialQuery(get_called_class());
    }

    public function getWareHouse($id)
    {
        return WareHouse::findOne($id);
    }

    public function getGroupFood($id)
    {
        return GroupFood::findOne($id);
    }

    public function getProductUnit($id)
    {
        return ProductUnit::findOne($id);
    }
}
