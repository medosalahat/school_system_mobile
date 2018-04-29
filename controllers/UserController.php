<?php
/**
 * Created by PhpStorm.
 * User: salahat
 * Date: 20/04/18
 * Time: 01:36 م
 */
namespace app\controllers;

use app\models\SignupForm;
use yii\rest\Controller;

class UserController extends Controller {

    public function actionSignup(){
        $model = new SignupForm();
        if($model->load(\Yii::$app->request->post()) && $model->validate()){

        }else{

        }
    }
}