<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Moneys]].
 *
 * @see Moneys
 */
class MoneysQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Moneys[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Moneys|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
