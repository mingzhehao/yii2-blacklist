<?php
/***************************************************************************
 * 测试管理
 * Copyright (c) 2016 github.com, Inc. All Rights Reserved
 * 
 **************************************************************************/
 
 
 
/**
 * @file backend/controllers/TestController.php
 * @author root(mingzhehao@github.com)
 * @date 2016/11/07 10:26:55
 *  
 **/

namespace backend\controllers;

use Yii;
use common\models\Test;
use backend\controllers\Controller;
use common\helper\Curl;
use yii\web\NotFoundHttpException;
use yii\web\ForbiddenHttpException;
use yii\filters\VerbFilter;

/**
 * AppController implements the CRUD actions for App model.
 */
class TestController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all App models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new Test();
        $res = "";
        if(!empty(Yii::$app->request->post("Test"))){
            extract(Yii::$app->request->post("Test"));
            $url = Yii::$app->params["url"]["list_url"];
            $params = "query=appid:$appid";
            $searchModel->appid = $appid;
            $res = Curl::doGet($url.$params);
        }
        return $this->render('index', [
            'model'   => $searchModel,
            'urls'    => trim($res),
        ]);
    }

    /**
     * 拼接远程其请求url
     * @param  array $appInfo     应用信息
     * @param  array $serviceInfo 服务信息
     * @param  string $params     自定义参数
     * @return string              url
     */
    private function getRequestUrl($appInfo,$serviceInfo,$params)
    {
        extract($appInfo);
        extract($serviceInfo);
        $customParams = array();
        if(!empty($params)){
            parse_str($params,$customParams);
        }
        $array = array(
            'pid'       =>  $pid,
            'appid'    =>  $appid,
            'action'    =>  $action,
            'format'    =>  "json",
            'timestamp' =>  time(),
        );
        $array = array_merge($array,$customParams);
        list($sign,$signParams) = $this->makeSign($array,$app_secret);
        $urlParams = http_build_query($signParams,'','&');
    }

    /**
     * 构建md5参数
     * @param  [type] $params [description]
     * @return [type]         [description]
     */
    public function makeParams($params,$appSecret)
    {   
        $paramsStr = "";
        ksort($params);
        foreach ($params as $key => $value) {
            $paramsStr .= $key.$value;
        }
        $paramsStr  = $appSecret.$paramsStr;
        $paramsStr .= $appSecret;
        return $paramsStr;
    }


    /**
     * 构建sign
     * @param  array $params 参数信息
     * @return array         sign信息，带有sign参数的新array
     */
    public function makeSign($params,$appKey)
    {
        $signStr = trim($this->makeParams($params,$appKey));
        $sign = strtolower(md5($signStr));
        $params = array_merge($params,array("sign" => $sign));
        return array($sign,$params);
    }

}





?>
