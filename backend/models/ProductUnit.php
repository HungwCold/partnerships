<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product_unit".
 *
 * @property int $id
 * @property int $hotel_id
 * @property string $name
 * @property string $created_at
 * @property string $updated_at
 */
class ProductUnit extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_unit';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['hotel_id', 'name'], 'required'],
            [['hotel_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 20],
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
            'name' => 'Đơn vị tính',
            'created_at' => 'Ngày tạo',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * {@inheritdoc}
     * @return ProductUnitQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProductUnitQuery(get_called_class());
    }
}
