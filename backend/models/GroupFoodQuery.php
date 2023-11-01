<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[GroupFood]].
 *
 * @see GroupFood
 */
class GroupFoodQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return GroupFood[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return GroupFood|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
