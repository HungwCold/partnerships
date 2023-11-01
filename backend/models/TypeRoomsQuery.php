<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[TypeRooms]].
 *
 * @see TypeRooms
 */
class TypeRoomsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return TypeRooms[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return TypeRooms|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
