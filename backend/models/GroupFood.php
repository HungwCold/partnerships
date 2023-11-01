<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "group_food".
 *
 * @property int $id
 * @property int $hotel_id
 * @property string $name
 * @property string $created_at
 * @property string $updated_at
 */
class GroupFood extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'group_food';
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
            'name' => 'Name',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * {@inheritdoc}
     * @return GroupFoodQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new GroupFoodQuery(get_called_class());
    }
}
