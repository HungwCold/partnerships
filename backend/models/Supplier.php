<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "supplier".
 *
 * @property int $id
 * @property int $hotel_id
 * @property string $companyName
 * @property string $contactName
 * @property string $address
 * @property string $phone
 * @property string $fax
 * @property string $created_at
 * @property string $updated_at
 */
class Supplier extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'supplier';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['hotel_id', 'companyName', 'contactName', 'address', 'phone', 'fax'], 'required'],
            [['hotel_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['companyName', 'contactName'], 'string', 'max' => 100],
            [['address'], 'string', 'max' => 255],
            [['phone', 'fax'], 'string', 'max' => 20],
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
            'companyName' => 'Tên nhà cung cấp',
            'contactName' => 'Email',
            'address' => 'Địa chỉ',
            'phone' => 'Điện thoại',
            'fax' => 'Fax',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * {@inheritdoc}
     * @return SupplierQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SupplierQuery(get_called_class());
    }
}
