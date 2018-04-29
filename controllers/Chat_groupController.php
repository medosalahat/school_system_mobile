<?php
/**
 * Created by PhpStorm.
 * User: salahat
 * Date: 21/04/18
 * Time: 09:11 م
 */
namespace app\controllers;
use yii\rest\ActiveController;
class Chat_groupController extends ActiveController{
    public $modelClass = 'app\models\ChatGroup';
    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'items',
    ];
}