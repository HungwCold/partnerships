<?php

namespace app\models;

use Yii;
use app\models\UserOrder;
use app\models\StatusRoom;
use app\models\Rooms;

/**
 * This is the model class for table "orders".
 *
 * @property int $id
 * @property int|null $user_id
 * @property int $hotel_id
 * @property int $room_id
 * @property float $total_price
 * @property int $status 1 =>new , 2 ->ok, 3 => done, 4 => unReceived
 * @property int $status_payment
 * @property string|null $order_number
 * @property int|null $bonus_point
 * @property string $email
 * @property string $phone_number
 * @property int|null $time_meet
 * @property string|null $check_in
 * @property string|null $check_out
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['room_id', 'status', 'status_payment', 'bonus_point', 'method_payment', 'identity_papers'], 'integer'],
            [['room_id', 'phone_number', 'identity_papers', 'increment_id'], 'required'],
            [['total_price'], 'match', 'pattern'=> '/^[0-9]{1,12}(\,[0-9]{0,4})?$/'],
            [['check_in', 'check_out', 'created_at', 'updated_at'], 'safe'],
            [['order_number', 'email', 'user_name'], 'string', 'max' => 255],
            [['phone_number', 'identity_number', 'time_meet'], 'string', 'max' => 32],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Mã',
            'increment_id' => 'Mã Order',
            'user_id' => 'Mã khách hàng',
            'user_name' => 'Tên khách hàng',
            'identity_papers' => 'Giấy tờ tùy thân',
            'identity_number' => 'Số tùy thân',
            'hotel_id' => 'Mã khách sạn',
            'room_id' => 'Số phòng',
            'total_price' => 'Tổng tiền',
            'status' => 'Trạng thái',
            'method_payment' => 'Hình thức thánh toán',
            'status_payment' => 'Trạng thái thanh toán',
            'order_number' => 'Mã đặt phòng online',
            'bonus_point' => 'Điểm thưởng',
            'email' => 'Email',
            'phone_number' => 'Số điện thoại',
            'time_meet' => 'Ngày giờ hẹn gặp',
            'check_in' => 'Giờ lấy phòng',
            'check_out' => 'Giờ trả phòng',
            'created_at' => 'Ngày tạo',
            'updated_at' => 'Ngày cập nhật',
        ];
    }

    /**
     * {@inheritdoc}
     * @return OrdersQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new OrdersQuery(get_called_class());
    }

    public function getNameStatusPayment($status_payment){
        return $status_payment === 0 ? "Chưa Thanh Toán" : "Đã Thanh Toán";
    }

    public function getStatus($status) {
        return StatusRoom::findOne($status)->status;
    }

    public function getStatusPayment($status) {
        return $status == 0 ? 'Chưa thanh toán' : 'Đã thanh toán';
    }

    public function getIdentityPapers($identity) {
        $identityName = null;
        switch ($identity) {
            case 1:
                $identityName = 'CMND';
                break;
            case 2:
                $identityName = 'CCCD';
                break;
            case 3:
                $identityName = 'Visa';
                break;
            case 4:
                $identityName = 'Khác';
                break;
        }
        return $identityName;
    }

    public function getRoomName($roomId) {
        return Rooms::findOne($roomId)->name_room;
    }

    public function getUser($id)
    {
        return UserOrder::findOne($id);
    }

    public static function getIncrementId($incrementId) {
        return Orders::find()->where(['increment_id'=> $incrementId])->one();
    }

     public static function getRoomId($roomId) {
        return Orders::find()->where(['room_id'=> $roomId])->one();
    }
}
