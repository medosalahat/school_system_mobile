<?php
/**
 * Created by PhpStorm.
 * User: salahat
 * Date: 21/04/18
 * Time: 09:34 م
 */
namespace app\controllers;
use yii\rest\ActiveController;
class Student_questionnaire_answersController extends ActiveController{
    public $modelClass = 'app\models\StudentQuestionnaireAnswers';
    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'items',
    ];
}