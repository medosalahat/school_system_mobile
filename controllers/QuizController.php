<?php
/**
 * Created by PhpStorm.
 * User: salahat
 * Date: 21/04/18
 * Time: 09:08 م
 */
namespace app\controllers;
use app\models\Quiz;
use app\models\StudentCoursesDivision;
use yii\rest\ActiveController;
use yii;
class QuizController extends ActiveController{
    public $modelClass = 'app\models\Quiz';
    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'items',
 ];

    public function actions() {
        $actions = parent::actions();
        unset($actions[ 'index']);
        return $actions;
    }
    public $prepareDataProvider;
    public $dataFilter;

    public function actionIndex() {
        $requestParams = Yii::$app->getRequest()->getBodyParams();
        if (empty($requestParams)) {
            $requestParams = Yii::$app->getRequest()->getQueryParams();
        }

        $filter = null;
        if ($this->dataFilter !== null) {
            $this->dataFilter = Yii::createObject($this->dataFilter);
            if ($this->dataFilter->load($requestParams)) {
                $filter = $this->dataFilter->build();
                if ($filter === false) {
                    return $this->dataFilter;
                }
            }
        }

        if ($this->prepareDataProvider !== null) {
            return call_user_func($this->prepareDataProvider, $this, $filter);
        }

        /* @var $modelClass \yii\db\BaseActiveRecord */
        $modelClass = $this->modelClass;

        $query = $modelClass::find();

        if (!empty($filter)) {
            $query->andWhere($filter);
        }
        $query->with(['coursesDivision','quizQuestions']);




        return Yii::createObject([
            'class' => yii\data\ActiveDataProvider::className(),
            'query' => $query,
            'pagination' => [
                'params' => $requestParams,
            ],
            'sort' => [
                'params' => $requestParams,
            ],
        ]);
    }

    public function actionQuestion(){


        $requestParams = Yii::$app->getRequest()->getQueryParams();

        if(!isset($requestParams['quiz_id']) or !isset($requestParams['student_courses_division_id'])){
            return ['valid'=>400,'message'=>'please add parameter quiz_id or student_courses_division_id'];
        }
        $quiz= Quiz::find()->where(['id'=>$requestParams['quiz_id']])->one();

        if(empty($quiz)){
            return ['valid'=>400,'message'=>'please check quiz id'];
        }

        $StudentCoursesDivision= StudentCoursesDivision::find()->where(['id'=>$requestParams['student_courses_division_id']])->one();

        if(empty($StudentCoursesDivision)){
            return ['valid'=>400,'message'=>'please check student_courses_division_id'];
        }


        $query='
            SELECT
                quiz.id,
                quiz.title,
                quiz.min_pass,
                quiz.max_pass,
                quiz_questions.title as quiz_questions_title,
                quiz_questions.mark,
                quiz_questions_answers.title as quiz_students_answers_title,
                quiz_questions_answers.is_true,
                quiz_students_answers.student_courses_division_id
                FROM
                `quiz`
                INNER JOIN
                quiz_questions ON quiz_questions.quiz_id = quiz.id
                INNER JOIN
                quiz_questions_answers ON quiz_questions_answers.quiz_questions_id = quiz_questions.id
                INNER JOIN
                quiz_students_answers ON quiz_students_answers.quiz_questions_answers_id = quiz_questions_answers.id
                WHERE
                `quiz`.`id` = '.$quiz->id.' AND 
                quiz_students_answers.student_courses_division_id = '.$StudentCoursesDivision->id.'
        ';

        $data =  Yii::$app->db->createCommand($query)->queryAll();

        if(empty($data)){
            return ['valid'=>400,'message'=>'not found any answers for this student'];
        }

        $table = [];
        $total =0;
        foreach ($data as $index=>$item) {
            $table[$index]['quiz_questions_title']=$item['quiz_questions_title'];
            $table[$index]['quiz_answers_title']=$item['quiz_students_answers_title'];
            $table[$index]['mark']=$item['mark'];
            $table[$index]['answers_correct']=$item['is_true'];
            if($item['is_true']){
                $total+=$item['mark'];
            }
        }

        $final = [
            'quiz'=>$quiz,
            'student'=>$StudentCoursesDivision->getStudent()->one(),
            'courses_division'=>$StudentCoursesDivision->getCoursesDivision()->one(),
            'table'=>$table,
            'total'=>$total
        ];

        return $final;
        /**

         */
    }
}