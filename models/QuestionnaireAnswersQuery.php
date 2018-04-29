<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[QuestionnaireAnswers]].
 *
 * @see QuestionnaireAnswers
 */
class QuestionnaireAnswersQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return QuestionnaireAnswers[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return QuestionnaireAnswers|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
