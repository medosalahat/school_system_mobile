<?php

use yii\db\Migration;

/**
 * Class m180508_165432_for_et_paasword_user
 */
class m180508_165432_for_et_paasword_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("ALTER TABLE `user` ADD `for_get` INT NULL DEFAULT NULL AFTER `token_id`;");

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180508_165432_for_et_paasword_user cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180508_165432_for_et_paasword_user cannot be reverted.\n";

        return false;
    }
    */
}
