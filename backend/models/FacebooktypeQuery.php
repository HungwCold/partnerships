<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Facebooktype]].
 *
 * @see Facebooktype
 */
class FacebooktypeQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Facebooktype[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Facebooktype|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
