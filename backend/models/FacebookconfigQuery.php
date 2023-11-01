<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Facebookconfig]].
 *
 * @see Facebookconfig
 */
class FacebookconfigQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Facebookconfig[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Facebookconfig|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
