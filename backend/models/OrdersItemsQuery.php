<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[OrdersItems]].
 *
 * @see OrdersItems
 */
class OrdersItemsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return OrdersItems[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return OrdersItems|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
