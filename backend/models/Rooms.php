<?php

namespace app\models;

use Yii;
use app\models\StatusRoom;
use app\models\TypeRooms;

/**
 * This is the model class for table "room_hotel".
 *
 * @property int $id
 * @property int $user_id
 * @property string $name_room
 * @property int $price_room
 * @property int $price_sale
 * @property string|null $images
 * @property string $created_at
 * @property string $updated_at
 */
class Rooms extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'room_hotel';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'name_room', 'price_room', 'price_sale', 'status', 'type'], 'required'],
            [['user_id', 'price_room', 'price_sale', 'status', 'type'], 'integer'],
            [['images'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['name_room'], 'string', 'max' => 100],
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
            'name_room' => 'Name Room',
            'price_room' => 'Price Room',
            'price_sale' => 'Price Sale',
            'status' => 'Trạng Thái',
            'type' => 'Loại Phòng',
            'images' => 'Images',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * {@inheritdoc}
     * @return RoomQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RoomQuery(get_called_class());
    }

    public function getStatusRoom($id) {
        $status = StatusRoom::findOne($id);
        if(empty($status)) {
            $status = StatusRoom::findOne(1);
        }
        return $status;
    }

    public function getTypeRoom($id)
    {
        return TypeRooms::findOne($id);
    }
}
