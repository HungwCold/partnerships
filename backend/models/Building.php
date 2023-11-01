<?php

namespace app\models;

use Yii;
use app\models\Address;

/**
 * This is the model class for table "building".
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string $created_at
 * @property string $updated_at
 */
class Building extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'building';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'name', 'address_id'], 'required'],
            [['user_id', 'address_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'Tên hotel',
            'name' => 'Tên tòa nhà',
            'address_id' => 'Địa chỉ',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * {@inheritdoc}
     * @return BuildingQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new BuildingQuery(get_called_class());
    }

    public function getAddressBuilding($id)
    {
        return Address::findOne($id);
    }
}
