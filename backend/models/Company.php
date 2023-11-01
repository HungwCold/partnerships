<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "company".
 *
 * @property int $id
 * @property int $hotel_id
 * @property string $name
 * @property string $tax_code
 * @property string $bank_account_number
 * @property string $address
 * @property string $email
 * @property string $phone
 * @property string $noted
 * @property int $status
 * @property int $status_confirmed
 * @property string $created_at
 * @property string $updated_at
 */
class Company extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'company';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['hotel_id', 'name', 'tax_code', 'bank_account_number', 'address', 'email', 'phone', 'noted', 'status', 'status_confirmed'], 'required'],
            [['hotel_id', 'status', 'status_confirmed'], 'integer'],
            [['noted'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'address'], 'string', 'max' => 200],
            [['tax_code', 'bank_account_number'], 'string', 'max' => 50],
            [['email'], 'string', 'max' => 80],
            [['phone'], 'string', 'max' => 15],
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
            'name' => 'Tên công ty',
            'tax_code' => 'Mã số thuế',
            'bank_account_number' => 'Số tài khoản',
            'address' => 'Địa chỉ',
            'email' => 'Email',
            'phone' => 'Số điện thoại',
            'noted' => 'Noted',
            'status' => 'Status',
            'status_confirmed' => 'Status Confirmed',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * {@inheritdoc}
     * @return CompanyQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CompanyQuery(get_called_class());
    }
}