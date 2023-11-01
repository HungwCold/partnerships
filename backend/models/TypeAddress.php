<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "type_address".
 *
 * @property int $id
 * @property string $name
 */
class TypeAddress extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'type_address';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * {@inheritdoc}
     * @return TypeAddQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TypeAddQuery(get_called_class());
    }
}
