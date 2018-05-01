<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[ChatClub]].
 *
 * @see ChatClub
 */
class ChatClubQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return ChatClub[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ChatClub|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
