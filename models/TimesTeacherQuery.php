<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[TimesTeacher]].
 *
 * @see TimesTeacher
 */
class TimesTeacherQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return TimesTeacher[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return TimesTeacher|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
