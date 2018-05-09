<?php

use yii\db\Migration;

/**
 * Class m180508_222804_new_f_q_g
 */
class m180508_222804_new_f_q_g extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("
                CREATE TABLE `general_questionnaire` (
                  `id` int(11) NOT NULL,
                  `title` text NOT NULL,
                  `type` enum('radio','text') NOT NULL DEFAULT 'radio',
                  `created_at` int(11) NOT NULL,
                  `updated_at` int(11) DEFAULT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
                  
                
                CREATE TABLE `general_questionnaire_answers` (
                  `id` int(11) NOT NULL,
                  `general_questionnaire_id` int(11) NOT NULL,
                  `title` text NOT NULL,
                  `created_at` int(11) NOT NULL,
                  `updated_at` int(11) DEFAULT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
                 
                CREATE TABLE `general_user_questionnaire_answers` (
                  `id` int(11) NOT NULL,
                  `general_questionnaire_id` int(11) NOT NULL,
                  `general_questionnaire_answers_id` int(11) DEFAULT NULL,
                  `user_id` int(11) NOT NULL,
                  `questionnaire_answers` text,
                  `created_at` int(11) NOT NULL,
                  `updated_at` int(11) DEFAULT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
                 
                ALTER TABLE `general_questionnaire`
                  ADD PRIMARY KEY (`id`),
                  ADD KEY `type` (`type`);
                 
                ALTER TABLE `general_questionnaire_answers`
                  ADD PRIMARY KEY (`id`),
                  ADD KEY `general_questionnaire_id` (`general_questionnaire_id`);
              
                ALTER TABLE `general_user_questionnaire_answers`
                  ADD PRIMARY KEY (`id`),
                  ADD KEY `general_questionnaire_answers_id` (`general_questionnaire_answers_id`),
                  ADD KEY `user_id` (`user_id`),
                  ADD KEY `general_questionnaire_id` (`general_questionnaire_id`);
                
                ALTER TABLE `general_questionnaire`
                  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
                 
                ALTER TABLE `general_questionnaire_answers`
                  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
                 
                ALTER TABLE `general_user_questionnaire_answers`
                  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
                 
                ALTER TABLE `general_questionnaire_answers`
                  ADD CONSTRAINT `general_questionnaire_answers_ibfk_1` FOREIGN KEY (`general_questionnaire_id`) REFERENCES `general_questionnaire` (`id`);
                 
                ALTER TABLE `general_user_questionnaire_answers`
                  ADD CONSTRAINT `general_user_questionnaire_answers_ibfk_1` FOREIGN KEY (`general_questionnaire_id`) REFERENCES `general_questionnaire` (`id`),
                  ADD CONSTRAINT `general_user_questionnaire_answers_ibfk_2` FOREIGN KEY (`general_questionnaire_answers_id`) REFERENCES `general_questionnaire_answers` (`id`),
                  ADD CONSTRAINT `general_user_questionnaire_answers_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

        ");

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180508_222804_new_f_q_g cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180508_222804_new_f_q_g cannot be reverted.\n";

        return false;
    }
    */
}
