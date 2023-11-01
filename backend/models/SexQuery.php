<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Sex]].
 *
 * @see Sex
 */
class SexQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Sex[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Sex|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
