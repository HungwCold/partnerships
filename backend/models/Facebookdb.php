<?php

namespace app\models;

use Yii;
use app\models\Facebooktype;
use app\models\Facebookconfig;

/**
 * This is the model class for table "facebookdb".
 *
 * @property string $uid
 * @property string $name
 * @property string $phone
 * @property string|null $comment
 * @property string $created_at
 * @property string $updated_at
 */
class Facebookdb extends \yii\db\ActiveRecord
{
    public $list_content;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'facebookdb';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['uid', 'name', 'phone'], 'required'],
            [['old'], 'integer'],
            [['comment'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['uid'], 'string', 'max' => 16],
            [['name'], 'string', 'max' => 50],
            [['sex'], 'string', 'max' => 1],
            [['phone'], 'string', 'max' => 20],
            [['uid'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'uid' => 'UID',
            'name' => 'Facebook Name',
            'sex' => 'Giới tính',
            'old' => 'Tuổi',
            'phone' => 'Phone',
            'comment' => 'Loại',
            'list_content' => 'List content',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * {@inheritdoc}
     * @return FacebookdbQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FacebookdbQuery(get_called_class());
    }

    public function getTypeUser($id)
    {
        return Facebooktype::findOne($id);
    }

    public function getApiKey()
    {
        return Facebookconfig::findOne(2)->apikey;
    }

    public static function getUID($uid)
    {
        return Facebookdb::find()->where(['uid' => $uid])->all();
    }

}
