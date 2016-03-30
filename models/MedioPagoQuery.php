<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[MedioPago]].
 *
 * @see MedioPago
 */
class MedioPagoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return MedioPago[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return MedioPago|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}