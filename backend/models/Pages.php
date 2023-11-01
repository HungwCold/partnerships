<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pages".
 *
 * @property string $id
 * @property string|null $about
 * @property string $category_list
 * @property string|null $location
 * @property string|null $phone
 * @property string $name
 * @property string|null $updated_at
 * @property string|null $created_at
 */
class Pages extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pages';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db2');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'category_list', 'name'], 'required'],
            [['about', 'category_list', 'location'], 'string'],
            [['updated_at', 'created_at'], 'safe'],
            [['id'], 'string', 'max' => 20],
            [['phone'], 'string', 'max' => 200],
            [['name'], 'string', 'max' => 255],
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
            'about' => 'About',
            'category_list' => 'Category List',
            'location' => 'Location',
            'phone' => 'Phone',
            'name' => 'Name',
            'updated_at' => 'Updated At',
            'created_at' => 'Created At',
        ];
    }

    /**
     * {@inheritdoc}
     * @return PagesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PagesQuery(get_called_class());
    }
}
