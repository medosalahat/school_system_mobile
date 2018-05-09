<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[GeneralQuestionnaire]].
 *
 * @see GeneralQuestionnaire
 */
class GeneralQuestionnaireQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return GeneralQuestionnaire[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return GeneralQuestionnaire|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
