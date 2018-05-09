<?php

use yii\db\Migration;

/**
 * Class m180509_000536_att
 */
class m180509_000536_att extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->execute("ALTER TABLE `attendance` CHANGE `student_courses_division_id` `student_id` INT(11) NOT NULL;");
        $this->execute("ALTER TABLE `attendance` DROP FOREIGN KEY `attendance_ibfk_1`; ALTER TABLE `attendance` ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `user`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180509_000536_att cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180509_000536_att cannot be reverted.\n";

        return false;
    }
    */
}
