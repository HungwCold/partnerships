<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "status_rooms".
 *
 * @property int $id
 * @property string $status
 * @property string $class
 */
class StatusRoom extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'status_rooms';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'status', 'class'], 'required'],
            [['status'], 'string', 'max' => 30],
            [['class'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'status' => 'Status',
            'class' => 'Class',
        ];
    }

    /**
     * {@inheritdoc}
     * @return StatusQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new StatusQuery(get_called_class());
    }
}