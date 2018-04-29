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
class Student_familyController extends ActiveController{
    public $modelClass = 'app\models\StudentFamily';
    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'items',
    ];
}