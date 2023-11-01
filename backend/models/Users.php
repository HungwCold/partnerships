<?php

namespace app\models;

use Yii;
use app\models\Facebookconfig;

/**
 * This is the model class for table "users".
 *
 * @property string $uid
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $birthday
 * @property string|null $gender
 * @property string|null $email
 * @property string|null $middle_name
 * @property string|null $name
 * @property string|null $relationship_status
 * @property string|null $work
 * @property string|null $education
 * @property string|null $favorite_athletes
 * @property string|null $favorite_teams
 * @property string|null $hometown
 * @property string|null $languages
 * @property string|null $location
 * @property string|null $locale
 * @property string|null $interested_in
 * @property string|null $updated_at
 * @property string|null $created_at
 * @property int|null $published_timeline
 * @property string|null $religion
 * @property string|null $significant_other
 * @property string|null $username
 * @property string|null $verified
 * @property string|null $likes
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
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
            [['uid'], 'required'],
            [['work', 'education', 'favorite_athletes', 'favorite_teams', 'hometown', 'languages', 'location', 'locale', 'interested_in', 'religion', 'likes'], 'string'],
            [['updated_at', 'created_at'], 'safe'],
            [['published_timeline'], 'integer'],
            [['uid'], 'string', 'max' => 20],
            [['first_name', 'last_name', 'name'], 'string', 'max' => 100],
            [['birthday'], 'string', 'max' => 15],
            [['gender', 'relationship_status'], 'string', 'max' => 10],
            [['email', 'username'], 'string', 'max' => 50],
            [['middle_name'], 'string', 'max' => 30],
            [['significant_other'], 'string', 'max' => 255],
            [['verified'], 'string', 'max' => 2],
            [['uid'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'uid' => 'Uid',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'birthday' => 'Birthday',
            'gender' => 'Gender',
            'email' => 'Email',
            'middle_name' => 'Middle Name',
            'name' => 'Name',
            'relationship_status' => 'Relationship Status',
            'work' => 'Work',
            'education' => 'Education',
            'favorite_athletes' => 'Favorite Athletes',
            'favorite_teams' => 'Favorite Teams',
            'hometown' => 'Hometown',
            'languages' => 'Languages',
            'location' => 'Location',
            'locale' => 'Locale',
            'interested_in' => 'Interested In',
            'updated_at' => 'Updated At',
            'created_at' => 'Created At',
            'published_timeline' => 'Published Timeline',
            'religion' => 'Religion',
            'significant_other' => 'Significant Other',
            'username' => 'Username',
            'verified' => 'Verified',
            'likes' => 'Likes',
        ];
    }

    /**
     * {@inheritdoc}
     * @return UsersQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UsersQuery(get_called_class());
    }

    public function getApiKey()
    {
        return Facebookconfig::findOne(2)->apikey;
    }
}
