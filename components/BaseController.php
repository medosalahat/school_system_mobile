<?php
/**
 * Created by PhpStorm.
 * User: salahat
 * Date: 19/04/18
 * Time: 03:26 ص
 */
namespace app\components;

use app\models\User;
use yii\rest\Controller;
use yii\filters\auth\HttpBasicAuth;
use  yii\filters\Cors;

class BaseController extends Controller {

    public function init(){
        parent::init();
        \Yii::$app->user->enableSession = false;
    }


    public function behaviors(){
        $behaviors = parent::behaviors();

        $behaviors['basicAuth']=[
            'class' => HttpBasicAuth::className(),
            'auth' => function ($username, $password) {
                $user = User::find()->where(['username' => $username])->one();
                if($user && $user->validatePassword($password)){
                    return $user;
                }else{
                    return null;
                }
            },
        ];
        $behaviors['corsFilter'] = [
            'class' => Cors::className(),
            'cors' => [
                'Origin' => ['*'],
                // 'Access-Control-Allow-Origin' => ['*', 'http://haikuwebapp.local.com:81','http://localhost:81'],
                'Access-Control-Request-Method' => ['GET', 'POST', 'PUT', 'PATCH', 'DELETE', 'HEAD', 'OPTIONS'],
                'Access-Control-Request-Headers' => ['*'],
                'Access-Control-Allow-Credentials' => null,
                'Access-Control-Max-Age' => 86400,
                'Access-Control-Expose-Headers' => []
            ]
        ];

        return $behaviors;
    }



}