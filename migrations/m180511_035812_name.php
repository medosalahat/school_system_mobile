<?php

use yii\db\Migration;

/**
 * Class m180511_035812_name
 */
class m180511_035812_name extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->execute("ALTER TABLE `chat_club` ADD `club_id` INT NOT NULL AFTER `updated_at`, ADD INDEX (`club_id`);ALTER TABLE `chat_club` ADD FOREIGN KEY (`club_id`) REFERENCES `club`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180511_035812_name cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180511_035812_name cannot be reverted.\n";

        return false;
    }
    */
}
