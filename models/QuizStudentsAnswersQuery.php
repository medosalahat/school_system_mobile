<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[QuizStudentsAnswers]].
 *
 * @see QuizStudentsAnswers
 */
class QuizStudentsAnswersQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return QuizStudentsAnswers[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return QuizStudentsAnswers|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
