<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Facebookdb]].
 *
 * @see Facebookdb
 */
class FacebookdbQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Facebookdb[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Facebookdb|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
