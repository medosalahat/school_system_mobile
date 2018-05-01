<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Tools]].
 *
 * @see Tools
 */
class ToolsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Tools[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Tools|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
