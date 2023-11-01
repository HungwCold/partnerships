<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[SubusersHotel]].
 *
 * @see SubusersHotel
 */
class SubusersHotelQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return SubusersHotel[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return SubusersHotel|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
