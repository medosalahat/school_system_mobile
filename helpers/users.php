<?php
/**
 * Created by PhpStorm.
 * User: salahat
 * Date: 08/05/18
 * Time: 07:44 م
 */
namespace app\helpers;

use app\models\StudentFamily;
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

        if (empty(\Yii::$app->request->getQueryParam('phone'))) {
            return 'Please make sure the request contains the phone parameter ';
        }

        /**@var $user User */
        $user = User::find()->where(['phone' => \Yii::$app->request->getQueryParam('phone')])->one();


        if (empty($user)) {
            $phone=\Yii::$app->request->getQueryParam('phone');
            if(empty(strstr($phone,'+'))){
                $phone='+'.\Yii::$app->request->getQueryParam('phone');
            }
            $user = User::find()->where(['phone' =>$phone ])->one();

        }

        if(empty($user)){
            return 'user phone not found ' . \Yii::$app->request->getQueryParam('phone');
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
        $phone=$user->phone;
        if(empty(strstr($phone,'+'))){
            $phone='+'.$phone;
        }
        try {
            $message = $client->messages->create(
            // '+962798981496', // Text this number
                $phone, // Text this number
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


    public static function For_send_message()
    {

        if (!\Yii::$app->request->getIsGet()) {
            return 'Please make sure the request is GET';
        }

        if (empty(\Yii::$app->request->getQueryParam('phone'))) {
            return 'Please make sure the request contains the phone parameter ';
        }

        if (empty(\Yii::$app->request->getQueryParam('message'))) {
            return 'Please make sure the request contains the message parameter ';
        }


        $data = \Yii::$app->params['twilio'];
        $sid = $data['id']; // Your Account SID from www.twilio.com/console
        $token = $data['token']; // Your Auth Token from www.twilio.com/console
        $client = new Client($sid, $token);
        $text = \Yii::$app->request->getQueryParam('message');
        $phone = \Yii::$app->request->getQueryParam('phone');
        if(empty(strstr($phone,'+'))){
            $phone='+'.$phone;
        }
        try {
            $message = $client->messages->create(
            // '+962798981496', // Text this number
                $phone, // Text this number
                [
                    'from' => $data['phone'], // From a valid Twilio number
                    'body' => $text
                ]
            );
            return [
                'status' => 200,
                'phone' => $phone,
                'message' => $text,
                'sid' => $message->sid,
                'send' => true,

                'response' => 'Sms delivery success'
            ];

        } catch (EnvironmentException $e) {
            return [
                'status' => 400,
                'phone' =>  $phone,
                'message' => $text,
                'sid' => null,
                'send' => false,

                'response' => $e->getMessage()
            ];
        }


    }

    public static function For_attendance($student_id)
    {

        if (!\Yii::$app->request->getIsGet()) {
            return 'Please make sure the request is GET';
        }


        /**@var $user User */
        $user = User::find()->where(['id'=>$student_id])->one();

        $f = StudentFamily::find()->where(['user_id'=>$user->id])->one();
        $f->family->phone;

        $data = \Yii::$app->params['twilio'];
        $sid = $data['id']; // Your Account SID from www.twilio.com/console
        $token = $data['token']; // Your Auth Token from www.twilio.com/console
        $client = new Client($sid, $token);
        $text = ' لم يتم حضور الطالب ';
        $text .=$user->username;
        $text .=' بتاريخ  ';
        $text .=date('Y-m-d');

        $phone =$f->family->phone;
        if(empty(strstr($phone,'+'))){
            $phone='+'.$phone;
        }
        try {
            $message = $client->messages->create(
            // '+962798981496', // Text this number
                $phone, // Text this number
                [
                    'from' => $data['phone'], // From a valid Twilio number
                    'body' => $text
                ]
            );
            return [
                'status' => 200,
                'phone' => $phone,
                'message' => $text,
                'sid' => $message->sid,
                'send' => true,
                'user'=>$user->attributes,
                'response' => 'Sms delivery success'
            ];

        } catch (EnvironmentException $e) {
            return [
                'status' => 400,
                'phone' =>  $phone,
                'message' => $text,
                'sid' => null,
                'send' => false,
                'user'=>$user->attributes,
                'response' => $e->getMessage()
            ];
        }


    }


    public static function resetPassword(){

        if (!\Yii::$app->request->getIsPost()) {
            return 'Please make sure the request is POSt';
        }

        if (empty(\Yii::$app->request->getBodyParam('phone'))) {
            return 'Please make sure the request contains the phone parameter ';
        }

         if (empty(\Yii::$app->request->getBodyParam('code'))) {
            return 'Please make sure the request contains the code parameter ';
        }

        if (empty(\Yii::$app->request->getBodyParam('password'))) {
            return 'Please make sure the request contains the password parameter ';
        }

        /**@var $user User */
        $user = User::find()->where(['phone' => \Yii::$app->request->getBodyParam('phone')])->one();

        if (empty($user)) {
            return 'user phone not found ' . \Yii::$app->request->getQueryParam('phone');
        }

        if(($user->for_get==\Yii::$app->request->getBodyParam('code')) and !empty(\Yii::$app->request->getBodyParam('password'))){

            $user->password = \Yii::$app->request->getBodyParam('password');
            $user->update(true,['password']);
            return [
                'valid'=>1,
                'message' =>  'تم تغيل كلمة المرور بنجاح',

            ];
        }else{
            return [
                'valid'=>0,
                'message' =>"لم يتم تغيل كلمة المرور ",
                'errors' =>$user->getFirstErrors(),

            ];
        }

    }
}