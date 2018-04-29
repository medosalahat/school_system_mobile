<?php
/**
 * Created by PhpStorm.
 * User: salahat
 * Date: 21/04/18
 * Time: 09:16 م
 */
namespace app\controllers;
use yii\rest\ActiveController;
class NotesController extends ActiveController{
    public $modelClass = 'app\models\Notes';
    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'items',
    ];
}