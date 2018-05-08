<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "student_courses_division_mark".
 *
 * @property int $id
 * @property int $student_courses_division_id
 * @property int $mark
 * @property int $created_at
 * @property int $updated_at
 *
 * @property StudentCoursesDivision $studentCoursesDivision
 */
class StudentCoursesDivisionMark extends \yii\db\ActiveRecord
{
    public function beforeValidate()
    { $this->created_at = time();
        return parent::beforeValidate(); // TODO: Change the autogenerated stub
    }

    public function beforeSave($insert)
    {

        $this->created_at = time();

        return parent::beforeSave($insert); // TODO: Change the autogenerated stub
    }
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'student_courses_division_mark';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['student_courses_division_id', 'mark', 'created_at', 'updated_at'], 'integer'],
            [['mark', 'created_at','student_courses_division_id'], 'required'],
            [['student_courses_division_id'], 'exist', 'skipOnError' => true, 'targetClass' => StudentCoursesDivision::className(), 'targetAttribute' => ['student_courses_division_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'student_courses_division_id' => Yii::t('app', 'Student Courses Division ID'),
            'mark' => Yii::t('app', 'Mark'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudentCoursesDivision()
    {
        return $this->hasOne(StudentCoursesDivision::className(), ['id' => 'student_courses_division_id']);
    }

    /**
     * @inheritdoc
     * @return StudentCoursesDivisionMarkQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new StudentCoursesDivisionMarkQuery(get_called_class());
    }
}
