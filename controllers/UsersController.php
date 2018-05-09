<?php
namespace app\controllers;
use app\helpers\users;
use app\models\CoursesDivision;
use app\models\User;
use yii\rest\ActiveController;
use sngrl\PhpFirebaseCloudMessaging\Client;
use sngrl\PhpFirebaseCloudMessaging\Message;
use sngrl\PhpFirebaseCloudMessaging\Notification;
use sngrl\PhpFirebaseCloudMessaging\Recipient\Device;

use yii;
class UsersController extends ActiveController{
    public $modelClass = 'app\models\User';
    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'items',
    ];


    public function actions() {
        $actions = parent::actions();
        unset($actions[ 'index']);
        return $actions;
    }
    public $prepareDataProvider;
    public $dataFilter;

    public function actionIndex() {
        $requestParams = Yii::$app->getRequest()->getBodyParams();
        if (empty($requestParams)) {
            $requestParams = Yii::$app->getRequest()->getQueryParams();
        }

        $filter = null;
        if ($this->dataFilter !== null) {
            $this->dataFilter = Yii::createObject($this->dataFilter);
            if ($this->dataFilter->load($requestParams)) {
                $filter = $this->dataFilter->build();
                if ($filter === false) {
                    return $this->dataFilter;
                }
            }
        }

        if ($this->prepareDataProvider !== null) {
            return call_user_func($this->prepareDataProvider, $this, $filter);
        }

        /* @var $modelClass \yii\db\BaseActiveRecord */
        $modelClass = $this->modelClass;

        $query = $modelClass::find();

        if (!empty($filter)) {
            $query->andWhere($filter);
        }

        if(isset($_GET['user_type_id']) and !empty($_GET['user_type_id']) ){

            $query->andFilterWhere(['=','user_type_id',$_GET['user_type_id']]);
        }

        $query->with(['chats','chats0','coursesDivisions','notes','notes0','studentCoursesDivisions','studentFamilies','studentFamilies0','userType']);




        return Yii::createObject([
            'class' => yii\data\ActiveDataProvider::className(),
            'query' => $query,
            'pagination' => [
                'params' => $requestParams,
            ],
            'sort' => [
                'params' => $requestParams,
            ],
        ]);
    }

    public function actionLogin(){

        if(\Yii::$app->request->getIsPost()){
            $username = \Yii::$app->request->post('username');
            $password = \Yii::$app->request->post('password');

            return ['user'=>User::find()->where(['username'=>$username,'password'=>$password])->one()];

        }
        return ['valid'=>false,'message'=>'please check is post request'];
    }


    public function actionNotifications(){
        if(!\Yii::$app->request->getIsPost()){
            return ['valid'=>false,'status'=>400,'message'=>'not found request'];

        }
        if(!\Yii::$app->request->post('user_id')){
            return ['valid'=>false,'status'=>400,'message'=>'not found user id'];

        }

        if(!\Yii::$app->request->post('message')){
            return ['valid'=>false,'status'=>400,'message'=>'not found message'];

        }

        $user = User::find()->where(['id'=>\Yii::$app->request->post('user_id')])->one();

        if(empty($user)){
            return ['valid'=>false,'status'=>400,'message'=>'user not found'];

        }

        if(empty($user->token_id)){
            return ['valid'=>false,'status'=>400,'message'=>'token is empty'];

        }

        $server_key = \Yii::$app->params['FirebaseNotifications'];
        $client = new Client();
        $client->setApiKey($server_key);
        $client->injectGuzzleHttpClient(new \GuzzleHttp\Client());

        $message = new Message();
        $message->setPriority('high');
        $message->addRecipient(new Device($user->token_id));
        $message
            ->setNotification(new Notification('notification',\Yii::$app->request->post('message')))
            //->setData(['key' => 'value'])
        ;

        $response = $client->send($message);
        return ['status'=>$response->getStatusCode(),'body'=>$response->getBody()];
    }

    public function actionGet_by_other_user(){
        $requestParams = Yii::$app->getRequest()->getQueryParams();

        if(  !isset($requestParams['teacher_id'])){
            return ['valid'=>400,'message'=>'please add parameter teacher_id'];
        }
        $User= User::find()->where(['id'=>$requestParams['teacher_id']])->one();

        if(empty($User)){
            return ['valid'=>400,'message'=>'please check teacher id'];
        }



        $query='
            SELECT 
            courses_division.id,
            division.title as division_title,
            classroom.title as classroom_title
            FROM `courses_division`
            INNER JOIN division on division.id = courses_division.division_id
            INNER JOIN classroom on classroom.id = division.classroom_id
            WHERE courses_division.teacher_id ='.$User->id.'
        ';

        return  Yii::$app->db->createCommand($query)->queryAll();
    }

    public function actionFor_get_password(){

        return users::forGetPassword();
    }
}