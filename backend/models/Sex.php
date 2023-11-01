<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sex".
 *
 * @property int $id
 * @property string|null $name
 */
class Sex extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sex';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'integer'],
            [['name'], 'string', 'max' => 50],
            [['id'], 'unique'],
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
     * @return SexQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SexQuery(get_called_class());
    }
}
