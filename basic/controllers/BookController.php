<?php
namespace app\controllers;
use Yii;
use yii\web\Response;
use app\models\Book;
use app\controllers\BaseContorller;
/**
 * Site controller
 */
class BookController extends BaseContorller
{
    //添加书籍
    public function actionGoo(){
        Yii::$app->response->format = Response::FORMAT_JSON;
        $model =new Book();
        //date_default_timezone_set('PRC');
        //$model->createTime = date("Y/m/d/H/i");
        $model->name="西游";
        $model->pageNumber="854";
        $model->summary="古典四大名著";
        $model->state="0";
        $model->tagNum="12";
        $model->image="54";
        if(empty($model->name))
        {
            return ["message"=>$model->errors];
        }
        $model->insert();
        return ["message"=>"添加成功"];
https://www.cnblogs.com/lhy521/p/5826041.html
    }
   //删除书籍
    public function actionDele(){
        Yii::$app->response->format = Response::FORMAT_JSON;
        $model= new Book();
        $model->id=3;
        if(!empty($model->id)){
            Book::findOne($model->id)->delete();
            return ['message'=>"删除成功"];
        }else{
            return ['message'=>"id不存在"];
        }

    }
    //查询信息
    public function actionSelect()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $model = new Book();
        if (!empty($model->errors)) {

            return ['message' => "查询失败"];
        } else {
            //查询所有内容
           return ['list'=>Book::find()->all()];

        }

    }
   //修改信息
    public function actionUpdate(){
        Yii::$app->response->format = Response::FORMAT_JSON;
        $model=new Book();
        $id='5';
        $image="";
        $model=Book::findOne($id,$image);
        $model->name="JAVA教程";
        $model->image="85";
        $model->update();
        if (!empty($model->errors)) {
            return ['message' => "修改失败"];
        } else {
            //查询所有内容
            return ['message' => "修改成功"];
        }
    }
    }

