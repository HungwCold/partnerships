<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "money_fund".
 *
 * @property int $id
 * @property string $name
 */
class MoneyFund extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'money_fund';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
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
            'name' => 'Name',
        ];
    }

    /**
     * {@inheritdoc}
     * @return MoneyFundQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MoneyFundQuery(get_called_class());
    }
}
