<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "student_courses_division".
 *
 * @property int $id
 * @property int $student_id
 * @property int $courses_division_id
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Attendance[] $attendances
 * @property QuizStudentsAnswers[] $quizStudentsAnswers
 * @property User $student
 * @property CoursesDivision $coursesDivision
 * @property StudentQuestionnaireAnswers[] $studentQuestionnaireAnswers
 */
class StudentCoursesDivision extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'student_courses_division';
    }
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
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['student_id', 'courses_division_id', 'created_at'], 'required'],
            [['student_id', 'courses_division_id', 'created_at', 'updated_at'], 'integer'],
            [['student_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['student_id' => 'id']],
            [['courses_division_id'], 'exist', 'skipOnError' => true, 'targetClass' => CoursesDivision::className(), 'targetAttribute' => ['courses_division_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'student_id' => Yii::t('app', 'Student ID'),
            'courses_division_id' => Yii::t('app', 'Courses Division ID'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttendances()
    {
        return $this->hasMany(Attendance::className(), ['student_courses_division_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuizStudentsAnswers()
    {
        return $this->hasMany(QuizStudentsAnswers::className(), ['student_courses_division_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudent()
    {
        return $this->hasOne(User::className(), ['id' => 'student_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCoursesDivision()
    {
        return $this->hasOne(CoursesDivision::className(), ['id' => 'courses_division_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudentQuestionnaireAnswers()
    {
        return $this->hasMany(StudentQuestionnaireAnswers::className(), ['student_courses_division_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return StudentCoursesDivisionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new StudentCoursesDivisionQuery(get_called_class());
    }
}