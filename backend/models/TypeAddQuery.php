<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[TypeAddress]].
 *
 * @see TypeAddress
 */
class TypeAddQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return TypeAddress[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return TypeAddress|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
