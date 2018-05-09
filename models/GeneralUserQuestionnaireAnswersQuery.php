<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[GeneralUserQuestionnaireAnswers]].
 *
 * @see GeneralUserQuestionnaireAnswers
 */
class GeneralUserQuestionnaireAnswersQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return GeneralUserQuestionnaireAnswers[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return GeneralUserQuestionnaireAnswers|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
