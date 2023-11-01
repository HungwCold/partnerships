<?php

namespace app\models;

use Yii;
use app\models\PositionHotel;
use app\models\Sex;

/**
 * This is the model class for table "subusers_hotel".
 *
 * @property int $id
 * @property int|null $hotel_id
 * @property string|null $username
 * @property string $password
 * @property int $sex
 * @property string $email
 * @property string|null $birthday
 * @property string|null $phone_number
 * @property int|null $position_id
 * @property int|null $status
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class SubusersHotel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'subusers_hotel';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['hotel_id', 'sex', 'position_id', 'status'], 'integer'],
            [['employee_code', 'password', 'sex', 'email'], 'required'],
            [['birthday', 'created_at', 'updated_at'], 'safe'],
            [['employee_code'], 'string', 'max' => 50],
            [['username'], 'string', 'max' => 30],
            [['password'], 'string', 'max' => 150],
            [['email'], 'string', 'max' => 255],
            [['phone_number'], 'string', 'max' => 15],
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
            'employee_code' => 'Mã nhân viên',
            'username' => 'Họ và tên đầy đủ',
            'password' => 'Mật khẩu',
            'sex' => 'Giới tính',
            'email' => 'Email',
            'birthday' => 'Ngày sinh',
            'phone_number' => 'Số điện thoại',
            'position_id' => 'Chức vụ',
            'status' => 'Status',
            'created_at' => 'Ngày tạo',
            'updated_at' => '',
        ];
    }

    /**
     * {@inheritdoc}
     * @return SubusersHotelQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SubusersHotelQuery(get_called_class());
    }

    public function getPosition($id)
    {
        return PositionHotel::findOne($id);
    }

    public function getSex($id)
    {
        return Sex::findOne($id);
    }
}
