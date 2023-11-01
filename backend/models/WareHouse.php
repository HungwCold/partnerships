<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "warehouse".
 *
 * @property int $id
 * @property int $hotel_id
 * @property string $name
 * @property string $manager
 * @property string $address
 * @property string $email
 * @property string $phone
 * @property string $noted
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 */
class WareHouse extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'warehouse';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['hotel_id', 'name', 'manager', 'address', 'email', 'phone', 'noted', 'status'], 'required'],
            [['id', 'hotel_id', 'status'], 'integer'],
            [['noted'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'phone'], 'string', 'max' => 20],
            [['manager', 'email'], 'string', 'max' => 50],
            [['address'], 'string', 'max' => 255],
            [['id'], 'unique'],
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
            'name' => 'Tên kho',
            'manager' => 'Quản lý kho',
            'address' => 'Địa chỉ',
            'email' => 'Email',
            'phone' => 'Điện thoại',
            'noted' => 'Ghi chú',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * {@inheritdoc}
     * @return WareHouseQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new WareHouseQuery(get_called_class());
    }
}
