<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[UserOrder]].
 *
 * @see UserOrder
 */
class UserOrderQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return UserOrder[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return UserOrder|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
