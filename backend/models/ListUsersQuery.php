<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[ListUsers]].
 *
 * @see ListUsers
 */
class ListUsersQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return ListUsers[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return ListUsers|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
