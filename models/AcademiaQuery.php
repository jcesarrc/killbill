<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Academia]].
 *
 * @see Academia
 */
class AcademiaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Academia[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Academia|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}