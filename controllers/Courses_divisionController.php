<?php
/**
 * Created by PhpStorm.
 * User: salahat
 * Date: 21/04/18
 * Time: 09:08 م
 */
namespace app\controllers;
use yii\rest\ActiveController;
class Courses_divisionController extends ActiveController{
    public $modelClass = 'app\models\CoursesDivision';
    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'items',
    ];
}