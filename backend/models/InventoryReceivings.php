<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "inventory_receivings".
 *
 * @property int $id
 * @property int $hotel_id
 * @property int $warehouse_id
 * @property int $supplier_id
 * @property int $money_fund_id
 * @property int $subusers_id
 * @property string $code_receiving
 * @property string $total_money
 * @property int $discount
 * @property int $value_added_tax
 * @property string $final_settlement
 * @property string $has_paid
 * @property string $products
 * @property string $note
 * @property int $status 1 => active, 2 => unactive
 * @property string $created_at
 * @property string $updated_at
 */
class InventoryReceivings extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'inventory_receivings';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['hotel_id', 'warehouse_id', 'supplier_id', 'money_fund_id', 'subusers_id', 'code_receiving', 'total_money', 'discount', 'value_added_tax', 'final_settlement', 'has_paid', 'products', 'note'], 'required'],
            [['hotel_id', 'warehouse_id', 'supplier_id', 'money_fund_id', 'subusers_id', 'discount', 'value_added_tax', 'status'], 'integer'],
            [['products', 'note'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['code_receiving', 'total_money', 'final_settlement', 'has_paid'], 'string', 'max' => 50],
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
            'warehouse_id' => 'Kho hàng',
            'supplier_id' => 'Nhà cung cấp',
            'money_fund_id' => 'Quỹ',
            'subusers_id' => 'Nhân viên',
            'code_receiving' => 'Mã phiếu nhập hàng',
            'total_money' => 'Tổng tiền',
            'discount' => 'Chiếc khấu',
            'value_added_tax' => 'Value Added Tax',
            'final_settlement' => 'Quyết toán',
            'has_paid' => 'Đã trả',
            'products' => 'Products',
            'note' => 'Ghi chú',
            'status' => 'Trạng thái',
            'created_at' => 'Từ ngày',
            'updated_at' => 'Đến ngày',
        ];
    }

    /**
     * {@inheritdoc}
     * @return InventoryReceivingsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new InventoryReceivingsQuery(get_called_class());
    }
}
