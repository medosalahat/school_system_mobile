<?php
/**
 * Created by PhpStorm.
 * User: salahat
 * Date: 20/04/18
 * Time: 09:13 م
 */
namespace app\components;

use yii\base\Component;
use yii\helpers\Json;

class API extends Component {

    public function sendFailedResponse($message)
    {
        $this->setHeader(400);

        echo json_encode(array('status' => 0, 'error_code' => 400, 'errors' => $message), JSON_PRETTY_PRINT);

        \Yii::$app->end();
    }


    public function sendSuccessResponse($data = false,$additional_info = false)
    {

        $this->setHeader(200);

        $response = [];
        $response['status'] = 1;

        if (is_array($data))
            $response['data'] = $data;

        if ($additional_info) {
            $response = array_merge($response, $additional_info);
        }

        $response = Json::encode($response, JSON_PRETTY_PRINT);


        if (isset($_GET['callback'])) {
            /* this is required for angularjs1.0 client factory API calls to work */
            $response = $_GET['callback'] . "(" . $response . ")";

            echo $response;
        } else {
            echo $response;
        }

        \Yii::$app->end();

    }

    protected function setHeader($status)
    {

        $text = $this->_getStatusCodeMessage($status);

        \Yii::$app->response->setStatusCode($status, $text);

        $status_header = 'HTTP/1.1 ' . $status . ' ' . $text;
        $content_type = "application/json; charset=utf-8";


        header($status_header);
        header('Content-type: ' . $content_type);
        header('X-Powered-By: ' . "Your Company <www.local.com>");
        header('Access-Control-Allow-Origin:*');


    }
    protected function _getStatusCodeMessage($status)
    {
        // these could be stored in a .ini file and loaded
        // via parse_ini_file()... however, this will suffice
        // for an example
        $codes = Array(
            200 => 'OK',
            400 => 'Bad Request',
            401 => 'Unauthorized',
            402 => 'Payment Required',
            403 => 'Forbidden',
            404 => 'Not Found',
            500 => 'Internal Server Error',
            501 => 'Not Implemented',
        );
        return (isset($codes[$status])) ? $codes[$status] : '';
    }
}
