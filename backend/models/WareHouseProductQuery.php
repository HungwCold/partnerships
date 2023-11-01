<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[WareHouseProduct]].
 *
 * @see WareHouseProduct
 */
class WareHouseProductQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return WareHouseProduct[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return WareHouseProduct|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
