<?php
/**
 * Created by PhpStorm.
 * User: salahat
 * Date: 08/05/18
 * Time: 07:44 م
 */
namespace app\helpers;

use app\models\User;
use Twilio\Exceptions\EnvironmentException;
use Twilio\Rest\Client;

class users
{

    public static function forGetPassword()
    {

        if (!\Yii::$app->request->getIsGet()) {
            return 'Please make sure the request is GET';
        }

        if (empty(\Yii::$app->request->getQueryParam('user_id'))) {
            return 'Please make sure the request contains the user_id parameter ';
        }

        /**@var $user User */
        $user = User::find()->where(['id' => \Yii::$app->request->getQueryParam('user_id')])->one();

        if (empty($user)) {
            return 'user id not found ' . \Yii::$app->request->getQueryParam('user_id');
        }

        if (empty($user->phone)) {
            return 'please make sure a phone not empty';
        }
        $rand = rand(rand(10, 20), rand(21, 55)) . rand(rand(10, 39), rand(40, 90));

        $user->for_get = $rand;
        $user->update(false, ['for_get']);

        $data = \Yii::$app->params['twilio'];
        $sid = $data['id']; // Your Account SID from www.twilio.com/console
        $token = $data['token']; // Your Auth Token from www.twilio.com/console
        $client = new Client($sid, $token);
        $text = "$rand is your school system for rest password code";
        try {
            $message = $client->messages->create(
            // '+962798981496', // Text this number
                $user->phone, // Text this number
                [
                    'from' => $data['phone'], // From a valid Twilio number
                    'body' => $text
                ]
            );
            return [
                'status' => 200,
                'phone' => $user->phone,
                'message' => $text,
                'sid' => $message->sid,
                'send' => true,
                'user'=>$user->attributes,
                'response' => 'Sms delivery success'
            ];

        } catch (EnvironmentException $e) {
            return [
                'status' => 400,
                'phone' =>  $user->phone,
                'message' => $text,
                'sid' => null,
                'send' => false,
                'user'=>$user->attributes,
                'response' => $e->getMessage()
            ];
        }


    }
}