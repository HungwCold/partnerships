<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "position_hotel".
 *
 * @property int $id
 * @property int $hotel_id
 * @property string|null $name
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class PositionHotel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'position_hotel';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['hotel_id', 'basic_pay'], 'required'],
            [['hotel_id'], 'integer'],
            [['basic_pay'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 50],
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
            'name' => 'Chức vụ',
            'basic_pay' => 'Hệ số lương',
            'created_at' => 'Ngày tạo',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * {@inheritdoc}
     * @return PositionHotelQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PositionHotelQuery(get_called_class());
    }
}
