<?php
namespace app\controllers;
use Yii;
use yii\web\Response;
use app\models\User;
use app\controllers\BaseContorller;
/**
 * Site controller
 */
class TestController extends BaseContorller
{
   public function  actionTest()
   {
       Yii::$app->response->format = Response::FORMAT_JSON;
       return ["message"=>JWT::decode($_SERVER['HTTP_AUTHORIZATION'])];
   }


}
