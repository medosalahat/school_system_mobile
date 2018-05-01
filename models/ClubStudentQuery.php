<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[ClubStudent]].
 *
 * @see ClubStudent
 */
class ClubStudentQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return ClubStudent[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ClubStudent|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
