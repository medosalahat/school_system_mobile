<?php

use yii\db\Migration;

/**
 * Class m180508_002118_token_id_for_user
 */
class m180508_002118_token_id_for_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("ALTER TABLE `user` ADD `token_id` TEXT NULL DEFAULT NULL AFTER `phone`;");

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180508_002118_token_id_for_user cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180508_002118_token_id_for_user cannot be reverted.\n";

        return false;
    }
    */
}
