<?php
namespace app\controllers;
use app\controllersJWT;
use app\models\RegApply;
use Yii;
use yii\web\Response;
use app\models\User;
use app\controllers\BaseContorller;

/**
 * Site controller
 */
class UserController extends BaseContorller
{
   public function  actionReg()
   {
       Yii::$app->response->format = Response::FORMAT_JSON;
       $model=new User();
       $model2=new RegApply();
       $request = Yii::$app->request;
       $model->user_Name=$request->post("userName");
       $model->userPwd=$request->post("userPwd");
       $model->name=$request->post("name");
       $model->employeeId=$request->post("eid");
       $model->validate();
       if(!empty($model->errors))
       {
           return ["message"=>$model->errors];
       }
       $model->salt=JWT::rand_salt(32);
       $model->salt=md5( $model->salt,false);
       $model->userPwd=md5( $model->userPwd. $model->salt,false);
       $model->createTime=strtotime(date("Y-m-d H:i",time()));
       $model->state=true;
       $model->insert();

       $model2->createTime=strtotime(date("Y-m-d H:i",time()));
       $model2->uid=$model->id;
       $model2->eId=$model->employeeId;
       $model2->state=false;
       $model2->passState=false;
       $model2->insert();

       return ["errorCode"=>"200","message"=>"注册申请提交成功,请耐心等待审核"];
   }

    public function  actionLogin()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $model=new User();
        $request = Yii::$app->request;
        $model->user_Name=$request->post("userName");
        $model->userPwd=$request->post("userPwd");

        $user=$model::find()->where(['user_Name' => $model->user_Name])->One();
        if(empty($user)){return["errorCode"=>"500","message"=>"用户名不存在"]; }
        if($user["userPwd"]!=md5($model->userPwd.$user["salt"],false)){return["errorCode"=>"500","message"=>"密码输入错误"];};
        $token=JWT::encode($user["id"]);
        return["errorCode"=>"200","message"=>"登录成功","token"=>$token];
    }
}
