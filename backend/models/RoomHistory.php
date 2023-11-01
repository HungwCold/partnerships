<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "room_history".
 *
 * @property int $id
 * @property int $room_id
 * @property int $user_id
 * @property int $status
 * @property string $content
 * @property string $created_at
 * @property string $updated_at
 */
class RoomHistory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'room_history';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['room_id', 'user_id', 'status', 'content'], 'required'],
            [['room_id', 'user_id', ], 'integer'],
            [['content', 'status'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'room_id' => 'Room ID',
            'user_id' => 'User ID',
            'status' => 'Trạng thái phòng',
            'content' => 'Nội Dung',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * {@inheritdoc}
     * @return RoomHistoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RoomHistoryQuery(get_called_class());
    }
}
