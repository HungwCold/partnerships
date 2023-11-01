<?php

namespace app\models;

use Yii;
use app\models\UserType;
/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string|null $firstName
 * @property string|null $lastName
 * @property string|null $username
 * @property int $sex
 * @property string $email
 * @property string|null $birthday
 * @property string $password
 * @property int|null $id_user_type Group user
 * @property string|null $list_users_hotel id hotel master [1,2,3,4]]
 * @property string $address
 * @property string $country
 * @property string $city
 * @property string $bank_account_number
 * @property string $passport
 * @property string $passport_date
 * @property string $passport_place
 * @property string $noted
 * @property string $status
 * @property string $status_confirmed
 * @property string|null $phone_number
 * @property int|null $role_id
 * @property int|null $bonus_point
 * @property string|null $social_id
 * @property string $token_device
 * @property string $system
 * @property string|null $facebook_token
 * @property string|null $google_token
 * @property int $setting_notification
 * @property string|null $remember_token
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property string|null $last_login
 */
class ListUsers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sex', 'email', 'password', 'address', 'country', 'city', 'bank_account_number', 'passport', 'passport_date', 'passport_place', 'noted', 'status', 'status_confirmed', 'token_device', 'system'], 'required'],
            [['sex', 'id_user_type', 'role_id', 'bonus_point', 'setting_notification'], 'integer'],
            [['birthday', 'created_at', 'updated_at', 'last_login'], 'safe'],
            [['list_users_hotel', 'token_device', 'facebook_token', 'google_token', 'remember_token'], 'string'],
            [['firstName', 'lastName', 'email', 'social_id'], 'string', 'max' => 255],
            [['username'], 'string', 'max' => 30],
            [['password', 'address', 'country', 'city', 'bank_account_number', 'passport', 'passport_date', 'passport_place', 'noted', 'status', 'status_confirmed', 'phone_number'], 'string', 'max' => 60],
            [['system'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'firstName' => 'First Name',
            'lastName' => 'Last Name',
            'username' => 'Username',
            'sex' => 'Sex',
            'email' => 'Email',
            'birthday' => 'Birthday',
            'password' => 'Password',
            'id_user_type' => 'Nhóm khách hàng',
            'list_users_hotel' => 'List Users Hotel',
            'address' => 'Address',
            'country' => 'Country',
            'city' => 'City',
            'bank_account_number' => 'Bank Account Number',
            'passport' => 'Passport',
            'passport_date' => 'Passport Date',
            'passport_place' => 'Passport Place',
            'noted' => 'Noted',
            'status' => 'Status',
            'status_confirmed' => 'Status Confirmed',
            'phone_number' => 'Số điện thoại',
            'role_id' => 'Role ID',
            'bonus_point' => 'Bonus Point',
            'social_id' => 'Social ID',
            'token_device' => 'Token Device',
            'system' => 'System',
            'facebook_token' => 'Facebook Token',
            'google_token' => 'Google Token',
            'setting_notification' => 'Setting Notification',
            'remember_token' => 'Remember Token',
            'created_at' => 'Ngày đăng kí',
            'updated_at' => 'Updated At',
            'last_login' => 'Last Login',
        ];
    }

    /**
     * {@inheritdoc}
     * @return ListUsersQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ListUsersQuery(get_called_class());
    }

    public function getUserType($id)
    {
        return UserType::findOne($id);
    }
}
