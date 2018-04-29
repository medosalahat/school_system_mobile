<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[StudentQuestionnaireAnswers]].
 *
 * @see StudentQuestionnaireAnswers
 */
class StudentQuestionnaireAnswersQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return StudentQuestionnaireAnswers[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return StudentQuestionnaireAnswers|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
