<?php
/**
 * Created by PhpStorm.
 * User: salahat
 * Date: 01/05/18
 * Time: 05:00 م
 */
namespace app\controllers;
use yii;
use yii\rest\ActiveController;
class Chat_clubController extends ActiveController{
    public $modelClass = 'app\models\ChatClub';
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

        if(isset($_GET['sender_id']) and !empty($_GET['sender_id'])  )
            $query->andFilterWhere(['=','sender_id',$_GET['sender_id']]);

        if(isset($_GET['club_student_id']) and !empty($_GET['club_student_id'])  )
            $query->andFilterWhere(['=','club_student_id',$_GET['club_student_id']]);
        $query->with(['clubStudent','sender']);




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
}