<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[QuizQuestionsAnswers]].
 *
 * @see QuizQuestionsAnswers
 */
class QuizQuestionsAnswersQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return QuizQuestionsAnswers[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return QuizQuestionsAnswers|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
