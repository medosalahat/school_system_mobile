<?php
/**
 * Created by PhpStorm.
 * User: salahat
 * Date: 21/04/18
 * Time: 09:24 م
 */
namespace app\controllers;
use yii\rest\ActiveController;
use yii;
class Quiz_questions_answersController extends ActiveController{
    public $modelClass = 'app\models\QuizQuestionsAnswers';
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
        $query->with(['quizQuestions','quizStudentsAnswers']);

        if(isset($_GET['quiz_questions_id']) and !empty($_GET['quiz_questions_id']) )
            $query->andFilterWhere(['=','quiz_questions_id',$_GET['quiz_questions_id']]);



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

    public function actionGet_answers(){
        if(isset($_GET['quiz_id']) and !empty($_GET['quiz_id']) ){

            $sql ="SELECT quiz_questions.* FROM `quiz_questions` WHERE quiz_questions.quiz_id =".$_GET['quiz_id'];
            $q=  Yii::$app->db->createCommand($sql)->queryAll();
            $sql ="SELECT quiz_questions_answers.* FROM `quiz_questions_answers`
                   INNER JOIN quiz_questions on quiz_questions.id= quiz_questions_answers.quiz_questions_id 
                   WHERE quiz_questions.quiz_id =".$_GET['quiz_id'];
            $ans=  Yii::$app->db->createCommand($sql)->queryAll();
            foreach ($q as $index=>$item) {
                $id = $item['id'];
                foreach ($ans as $in=>$s){
                    if($s['quiz_questions_id']==$id){
                        $q[$index]['answers'][]=$s;
                    }
                }
            }

            return $q;

        }else{
            return 'not found quiz id';
        }


    }
}