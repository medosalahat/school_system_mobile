<?php

use yii\db\Migration;

/**
 * Class m180507_225411_student_courses_division_mark
 */
class m180507_225411_student_courses_division_mark extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->execute("CREATE TABLE `student_courses_division_mark` (
  `id` int(11) NOT NULL,
  `student_courses_division_id` int(11) NOT NULL,
  `mark` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student_courses_division_mark`
--
ALTER TABLE `student_courses_division_mark`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_courses_division_id` (`student_courses_division_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student_courses_division_mark`
--
ALTER TABLE `student_courses_division_mark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `student_courses_division_mark`
--
ALTER TABLE `student_courses_division_mark`
  ADD CONSTRAINT `student_courses_division_mark_ibfk_1` FOREIGN KEY (`student_courses_division_id`) REFERENCES `student_courses_division` (`id`);");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180507_225411_student_courses_division_mark cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180507_225411_student_courses_division_mark cannot be reverted.\n";

        return false;
    }
    */
}
