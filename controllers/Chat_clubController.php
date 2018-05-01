<?php
/**
 * Created by PhpStorm.
 * User: salahat
 * Date: 01/05/18
 * Time: 05:00 م
 */
namespace app\controllers;
use yii\rest\ActiveController;
class Chat_clubController extends ActiveController{
    public $modelClass = 'app\models\ChatClub';
    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'items',
    ];
}