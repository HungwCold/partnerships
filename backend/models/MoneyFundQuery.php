<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[MoneyFund]].
 *
 * @see MoneyFund
 */
class MoneyFundQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return MoneyFund[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return MoneyFund|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
