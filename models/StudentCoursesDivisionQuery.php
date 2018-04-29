<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[StudentCoursesDivision]].
 *
 * @see StudentCoursesDivision
 */
class StudentCoursesDivisionQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return StudentCoursesDivision[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return StudentCoursesDivision|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
