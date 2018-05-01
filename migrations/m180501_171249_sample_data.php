<?php

use yii\db\Migration;

/**
 * Class m180501_171249_sample_data
 */
class m180501_171249_sample_data extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 01, 2018 at 08:12 PM
-- Server version: 5.7.20-0ubuntu0.16.04.1
-- PHP Version: 7.0.28-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = \"NO_AUTO_VALUE_ON_ZERO\";
SET time_zone = \"+00:00\";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school_system_mobile`
--

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `student_courses_division_id`, `is_available`, `date`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2018-01-20', 1525194434, 1525194434),
(2, 2, 1, '2018-01-20', 1525194439, 1525194439),
(3, 3, 1, '2018-01-20', 1525194444, 1525194444),
(4, 4, 1, '2018-01-20', 1525194446, 1525194446);

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`id`, `message`, `sender_id`, `reciver_id`, `seen`, `created_at`, `updated_at`) VALUES
(1, 'test message\n', 1, 2, 0, 1525194663, 1525194663);

--
-- Dumping data for table `chat_club`
--

INSERT INTO `chat_club` (`id`, `message`, `sender_id`, `club_student_id`, `created_at`, `updated_at`) VALUES
(1, 'message', 3, 1, 1525194280, NULL);

--
-- Dumping data for table `chat_group`
--

INSERT INTO `chat_group` (`id`, `message`, `courses_division_id`, `sender_id`, `created_at`, `updated_at`) VALUES
(1, 'test message', 1, 1, 1525194465, 1525194465),
(2, 'test message', 2, 1, 1525194481, 1525194481);

--
-- Dumping data for table `classroom`
--

INSERT INTO `classroom` (`id`, `title`, `level`, `created_at`, `updated_at`) VALUES
(1, '201', '1', 1525192926, 1525192926),
(2, '202', '1', 1525192932, 1525192932),
(3, '203', '1', 1525192937, 1525192937);

--
-- Dumping data for table `club`
--

INSERT INTO `club` (`id`, `title`, `teacher_id`, `created_at`, `updated_at`) VALUES
(1, 'club english', 1, 1525193456, NULL);

--
-- Dumping data for table `club_student`
--

INSERT INTO `club_student` (`id`, `club_id`, `student_id`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 1, 1525193488, NULL);

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `title`, `max_pass`, `min_pass`, `created_at`, `updated_at`) VALUES
(1, 'arabic', 100, 50, 1525192690, 1525192690),
(2, 'english', 100, 50, 1525192696, 1525192696),
(3, 'Sciences', 100, 50, 1525192717, 1525192717),
(4, 'Economie', 100, 50, 1525192729, 1525192729),
(5, 'Mathematics', 100, 50, 1525192741, 1525192741);

--
-- Dumping data for table `courses_division`
--

INSERT INTO `courses_division` (`id`, `teacher_id`, `courses_id`, `division_id`, `year`, `season`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 2018, 'Summer', 1525194359, 1525194359),
(2, 1, 1, 1, 2018, 'Spring', 1525194364, 1525194364);

--
-- Dumping data for table `division`
--

INSERT INTO `division` (`id`, `title`, `classroom_id`, `max_number_student`, `min_number_student`, `created_at`, `updated_at`) VALUES
(1, 'division name', 1, 50, 10, 1525192976, 1525192976),
(2, 'division name', 2, 50, 10, 1525192979, 1525192979);

--
-- Dumping data for table `home_work`
--

INSERT INTO `home_work` (`id`, `courses_division_id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 'title home work', 'description home work', 1525194678, 1525194678);

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1524097408);

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `title`, `description`, `teacher_id`, `family_id`, `created_at`, `updated_at`) VALUES
(1, 'note title', 'note description', 1, 4, 1525191147, 1525191147),
(2, 'note title', 'note description', 1, 5, 1525191172, 1525191172),
(3, 'note title 2', 'note description 2', 1, 4, 1525191181, 1525191181);

--
-- Dumping data for table `questionnaire`
--

INSERT INTO `questionnaire` (`id`, `title`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Questionnaire', 'radio', 1525194497, 1525194497);

--
-- Dumping data for table `questionnaire_answers`
--

INSERT INTO `questionnaire_answers` (`id`, `questionnaire_id`, `title`, `created_at`, `updated_at`) VALUES
(1, 1, 'option one', 1525194509, 1525194509),
(2, 1, 'option two\n', 1525194517, 1525194517);

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`id`, `title`, `courses_division_id`, `min_pass`, `max_pass`, `created_at`, `updated_at`) VALUES
(1, 'quiz 1', 1, 100, 200, 1525194545, 1525194545),
(2, 'quiz 12', 2, 100, 200, 1525194552, 1525194552);

--
-- Dumping data for table `quiz_questions`
--

INSERT INTO `quiz_questions` (`id`, `quiz_id`, `title`, `created_at`, `updated_at`) VALUES
(1, 1, 'one of them .?', 1525194568, 1525194568),
(2, 1, 'one of them .? 2', 1525194571, 1525194571),
(3, 2, 'one of them .? 2', 1525194574, 1525194574),
(4, 2, 'one of them .? ', 1525194578, 1525194578);

--
-- Dumping data for table `quiz_questions_answers`
--

INSERT INTO `quiz_questions_answers` (`id`, `quiz_questions_id`, `title`, `is_true`, `created_at`, `updated_at`) VALUES
(1, 1, 'option 1', 1, 1525194591, 1525194591),
(2, 1, 'option 2', 0, 1525194597, 1525194597),
(3, 1, 'option 3', 0, 1525194601, 1525194601),
(4, 1, 'option 4', 0, 1525194604, 1525194604),
(5, 2, 'option 1', 0, 1525194609, 1525194609),
(6, 2, 'option 2', 1, 1525194613, 1525194613),
(7, 2, 'option 3', 0, 1525194619, 1525194619),
(8, 2, 'option 4', 0, 1525194623, 1525194623);

--
-- Dumping data for table `quiz_students_answers`
--

INSERT INTO `quiz_students_answers` (`id`, `student_courses_division_id`, `quiz_questions_id`, `quiz_questions_answers_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1525194635, 1525194635);

--
-- Dumping data for table `student_courses_division`
--

INSERT INTO `student_courses_division` (`id`, `student_id`, `courses_division_id`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 1525194398, 1525194398),
(2, 2, 2, 1525194401, 1525194401),
(3, 3, 2, 1525194404, 1525194404),
(4, 3, 1, 1525194407, 1525194407);

--
-- Dumping data for table `student_family`
--

INSERT INTO `student_family` (`id`, `user_id`, `family_id`, `created_at`, `updated_at`) VALUES
(1, 2, 4, 1525191464, 1525191464),
(2, 3, 5, 1525191471, 1525191471);

--
-- Dumping data for table `times_teacher`
--

INSERT INTO `times_teacher` (`id`, `text`, `teacher_id`, `days`, `time`, `created_at`, `updated_at`) VALUES
(1, 'text', 1, 'monday', '12:10:00', 1525191518, NULL),
(2, 'text', 1, 'monday', '13:10:00', 1525191524, NULL);

--
-- Dumping data for table `tools`
--

INSERT INTO `tools` (`id`, `title`, `courses_id`, `teacher_id`, `created_at`, `updated_at`) VALUES
(2, 'tools 1', 1, 1, 1525193783, NULL),
(3, 'tools 2', 1, 1, 1525193789, NULL);

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `status`, `user_type_id`, `created_at`, `updated_at`) VALUES
(1, 'teacher_1', 'teacher_1', 'teacher@school.com', 10, 2, 1525190300, 1525190300),
(2, 'student_1', 'student_1', 'student_1@school.com', 10, 1, 1525190347, 1525190347),
(3, 'student_2', 'student_2', 'student_2@school.com', 10, 1, 1525190360, 1525190360),
(4, 'family_1', 'family_1', 'family_1@school.com', 10, 3, 1525190402, 1525190402),
(5, 'family_2', 'family_2', 'family_2@school.com', 10, 3, 1525190417, 1525190417);

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'students', 1525190220, 1525190220),
(2, 'teacher', 1525190234, 1525190234),
(3, 'Family', 1525190253, 1525190253);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180501_171249_sample_data cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180501_171249_sample_data cannot be reverted.\n";

        return false;
    }
    */
}
