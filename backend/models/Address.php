<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "address".
 *
 * @property int $id
 * @property int $user_id
 * @property string $name_hotel
 * @property string $tel_hotel
 * @property string $address
 * @property string $city
 * @property string $city_search
 * @property string $district
 * @property string $district_search
 * @property string $ward
 * @property string $ward_search
 * @property string|null $services
 * @property float $latitude
 * @property float $longitude
 * @property string $created_at
 * @property string $updated_at
 */
class Address extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'address';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'name_hotel', 'tel_hotel', 'address', 'city', 'city_search', 'district', 'district_search', 'ward', 'ward_search', 'latitude', 'longitude'], 'required'],
            [['user_id'], 'integer'],
            [['address', 'services'], 'string'],
            [['latitude', 'longitude'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
            [['name_hotel'], 'string', 'max' => 255],
            [['tel_hotel'], 'string', 'max' => 20],
            [['city', 'city_search', 'district', 'district_search', 'ward', 'ward_search'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'name_hotel' => 'Tên khách sạn',
            'tel_hotel' => 'Số điện thoại',
            'address' => 'Đia chỉ',
            'city' => 'Thành phố',
            'city_search' => 'City Search',
            'district' => 'Quận(huyện)',
            'district_search' => 'District Search',
            'ward' => 'Phường(xã)',
            'ward_search' => 'Ward Search',
            'services' => 'Services',
            'latitude' => 'Latitude',
            'longitude' => 'Longitude',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * {@inheritdoc}
     * @return AddressQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AddressQuery(get_called_class());
    }
}
