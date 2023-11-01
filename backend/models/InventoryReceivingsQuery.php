<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[InventoryReceivings]].
 *
 * @see InventoryReceivings
 */
class InventoryReceivingsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return InventoryReceivings[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return InventoryReceivings|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
