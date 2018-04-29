<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[StudentFamily]].
 *
 * @see StudentFamily
 */
class StudentFamilyQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return StudentFamily[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return StudentFamily|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
