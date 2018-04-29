<?php
/**
 * Created by PhpStorm.
 * User: salahat
 * Date: 21/04/18
 * Time: 09:17 م
 */

namespace app\controllers;
use yii\rest\ActiveController;
class Questionnaire_answersController extends ActiveController{
    public $modelClass = 'app\models\QuestionnaireAnswers';
    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'items',
    ];
}