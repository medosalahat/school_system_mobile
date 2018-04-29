<?php
/**
 * Created by PhpStorm.
 * User: salahat
 * Date: 21/04/18
 * Time: 09:24 م
 */
namespace app\controllers;
use yii\rest\ActiveController;
class Quiz_questions_answersController extends ActiveController{
    public $modelClass = 'app\models\QuizQuestionsAnswers';
    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'items',
    ];
}