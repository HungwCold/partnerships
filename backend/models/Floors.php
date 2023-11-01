<?php

namespace app\models;

use Yii;
use app\models\Building;

/**
 * This is the model class for table "floors".
 *
 * @property int $id
 * @property int $id_building
 * @property string $name
 * @property string $created_at
 * @property string $updated_at
 */
class Floors extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'floors';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_building', 'name'], 'required'],
            [['id_building'], 'integer'],
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
            'id_building' => 'Tên Tòa nhà',
            'name' => 'Tên Tầng (lầu)',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * {@inheritdoc}
     * @return FloorsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FloorsQuery(get_called_class());
    }

    public function getNameBuilding($id)
    {
        return Building::findOne($id);
    }
}
