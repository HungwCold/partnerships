<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "facebookconfig".
 *
 * @property int $id
 * @property string $apikey
 * @property string $created_at
 * @property string $updated_at
 */
class Facebookconfig extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'facebookconfig';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['apikey'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['apikey'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'apikey' => 'Api Key',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * {@inheritdoc}
     * @return FacebookconfigQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FacebookconfigQuery(get_called_class());
    }
}
