<?php

use yii\db\Migration;

/**
 * Class m180513_040105_phone_user
 */
class m180513_040105_phone_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->execute("ALTER TABLE `user` CHANGE `phone` `phone` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL;");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180513_040105_phone_user cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180513_040105_phone_user cannot be reverted.\n";

        return false;
    }
    */
}
