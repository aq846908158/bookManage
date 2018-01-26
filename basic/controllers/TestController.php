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
       $model=new User();
       $model->user_Name="12345678123456781234567812345678";
       $model->userPwd="12345678123456781234567812345678";
       $model->name="我是";
       $model->validate();

       if(!empty($model->errors))
       {
           return ["message"=>$model->errors];
       }
       $model->insert();
       return ["message"=>"查询成功"];
   }


}
