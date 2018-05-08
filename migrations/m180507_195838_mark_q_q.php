<?php

use yii\db\Migration;

/**
 * Class m180507_195838_mark_q_q
 */
class m180507_195838_mark_q_q extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->execute("ALTER TABLE `quiz_questions` ADD `mark` INT NOT NULL DEFAULT '0' AFTER `title`;");

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180507_195838_mark_q_q cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180507_195838_mark_q_q cannot be reverted.\n";

        return false;
    }
    */
}
