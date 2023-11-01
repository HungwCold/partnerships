<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[StatusRoom]].
 *
 * @see StatusRoom
 */
class StatusQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return StatusRoom[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return StatusRoom|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
