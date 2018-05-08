<?php
/**
 * Created by PhpStorm.
 * User: salahat
 * Date: 21/04/18
 * Time: 09:25 م
 */

//StudentCoursesDivisionController
namespace app\controllers;
use yii\rest\ActiveController;
use yii;
class Student_courses_divisionController extends ActiveController{
    public $modelClass = 'app\models\StudentCoursesDivision';
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

        if(isset($_GET['courses_division_id']) and !empty($_GET['courses_division_id']) ){

            $query->andFilterWhere(['=','courses_division_id',$_GET['courses_division_id']]);
        }

        if(isset($_GET['student_id']) and !empty($_GET['student_id']) ){

            $query->andFilterWhere(['=','student_id',$_GET['student_id']]);
        }

        $query->with(['attendances','quizStudentsAnswers','student','coursesDivision','studentQuestionnaireAnswers']);




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
}