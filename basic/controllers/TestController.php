<?php
namespace app\controllers;
use app\models\Tag;
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
       $model2=new Tag();
       $model2->tagName="我草你妈";
       $model2->bids="19";
       $model2->bookNum=1;
       $model2->insert();
        die;
       return ["message"=>JWT::decode($_SERVER['HTTP_AUTHORIZATION'])];
   }


}
