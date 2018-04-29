<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[HomeWork]].
 *
 * @see HomeWork
 */
class HomeWorkQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return HomeWork[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return HomeWork|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
