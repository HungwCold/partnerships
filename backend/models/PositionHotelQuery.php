<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[PositionHotel]].
 *
 * @see PositionHotel
 */
class PositionHotelQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return PositionHotel[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return PositionHotel|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
