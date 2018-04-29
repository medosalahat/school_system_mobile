<?php
/**
 * Created by PhpStorm.
 * User: salahat
 * Date: 21/04/18
 * Time: 09:35 م
 */
namespace app\controllers;
use yii\rest\ActiveController;
class User_typeController extends ActiveController{
    public $modelClass = 'app\models\UserType';
    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'items',
    ];
}