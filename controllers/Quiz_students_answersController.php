<?php
/**
 * Created by PhpStorm.
 * User: salahat
 * Date: 21/04/18
 * Time: 09:21 م
 */
//Quiz_questionsController
namespace app\controllers;
use yii\rest\ActiveController;
class Quiz_students_answersController extends ActiveController{
    public $modelClass = 'app\models\QuizStudentsAnswers';
    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'items',
    ];
}