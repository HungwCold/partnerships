<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "moneys".
 *
 * @property int $id
 * @property int $hotel_id
 * @property string $name
 * @property string $code
 * @property string $scale
 * @property int $status 1 => active, 2 => unactive
 * @property string $created_at
 * @property string $updated_at
 */
class Moneys extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'moneys';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['hotel_id', 'name', 'code', 'scale'], 'required'],
            [['hotel_id', 'status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'code'], 'string', 'max' => 50],
            [['scale'], 'string', 'max' => 20],
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
            'name' => 'Loại tiền tệ',
            'code' => 'Mã',
            'scale' => 'Tỉ lệ',
            'status' => 'Mặc định',
            'created_at' => 'Ngày tạo',
            'updated_at' => 'Cập nhật cuối cùng',
        ];
    }

    /**
     * {@inheritdoc}
     * @return MoneysQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MoneysQuery(get_called_class());
    }
}
