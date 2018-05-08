<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[StudentCoursesDivisionMark]].
 *
 * @see StudentCoursesDivisionMark
 */
class StudentCoursesDivisionMarkQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return StudentCoursesDivisionMark[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return StudentCoursesDivisionMark|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
