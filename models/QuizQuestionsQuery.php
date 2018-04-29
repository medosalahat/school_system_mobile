<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[QuizQuestions]].
 *
 * @see QuizQuestions
 */
class QuizQuestionsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return QuizQuestions[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return QuizQuestions|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
