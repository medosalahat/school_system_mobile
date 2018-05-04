<?php

use yii\db\Migration;

/**
 * Class m180504_224835_phone_user
 */
class m180504_224835_phone_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->execute("ALTER TABLE `user` ADD `phone` VARCHAR(100) NULL DEFAULT NULL AFTER `user_type_id`;");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180504_224835_phone_user cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180504_224835_phone_user cannot be reverted.\n";

        return false;
    }
    */
}
