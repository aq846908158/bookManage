<?php
namespace app\controllers;
use app\models\Librarian;
use Yii;
use yii\web\Response;
use app\models\Enterprise;
use app\models\Activation;


/**
 * Site controller
 */

class EnterpriseController extends BaseContorller
{

   public function  actionGetAllEnterprise()
   {
       $model=new Enterprise();
       $result=$model::find()->all();
       Yii::$app->response->format = Response::FORMAT_JSON;
       return ["message"=>"查询成功","list"=>$result];
   }

    public function  actionEnterprise_activation()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        //解码token信息
        $message=JWT::decode($_SERVER['HTTP_AUTHORIZATION']);   if(!$message){ return ["errorCode"=>"500","message"=>"身份验证失败"];}

        $model=new Enterprise();
        $model2=new Activation();
        $model3=new Librarian();

        $request = Yii::$app->request;
        $model->name = $request->post('name');//取前台传入的企业名称
        $model->activation=$request->post('activation');//取前台传入的激活码信息
        $model->validate();//验证数据，以及企业名称是否被使用
        if(!empty($model->errors))//数据出现错误则（程序结束）
        {
            return ["errorCode"=>"500","message"=>$model->errors];
        }


        $Activation=$model2::find()->where(['activation' => $model->activation])->One();//查询激活码信息
        if(empty($Activation)) {  return ["errorCode"=>"500","message"=>"激活码不存在"]; }//激活码不存在时报错（程序结束）
        if($Activation["state"]==true){  return ["errorCode"=>"500","message"=>"激活码已被使用"];  }//激活码已被使用时报错（程序结束）

        //修改激活码使用状态为已使用，使用时间为当前时间
        $temp=$model2::findOne($Activation["id"]);
        $temp->state=true;
        $temp->useTime=strtotime(date("Y-m-d H:i",time()));
        $temp->save();
        //将企业录入数据表中，激活状态改为已激活
        $model->createTime=strtotime(date("Y-m-d H:i",time()));
        $model->activationState=true;
        $model->insert();
        //将激活企业时登录的用户添加为企业管理者
        $model3->eid=$model->id;
        $model3->uids=$message["uid"];
        $model3->insert();


        return ["errorCode"=>"200","message"=>"企业注册激活成功"];//返回信息，程序结束
    }

}
