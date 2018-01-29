<?php
namespace app\controllers;
use app\models\Tag;
use Yii;
use yii\data\Pagination;
use yii\web\Response;
use app\models\Book;
use app\controllers\BaseContorller;
use app\models\User;
/**
 * Site controller
 */
class BookController extends BaseContorller
{
    //添加书籍
    public function actionAdd_book(){
        $message=JWT::decode($_SERVER['HTTP_AUTHORIZATION']);   if(!$message){ return ["errorCode"=>"500","message"=>"身份验证失败"];}
        Yii::$app->response->format = Response::FORMAT_JSON;
        $model =new Book();
        $request = Yii::$app->request;

        $model->summary=$request->post("summary");
        $model->name=$request->post("name");
        $model->image=$request->post("image");
        $model->createTime=$_SERVER['REQUEST_TIME'];
        $model->state="0";
        $model->tagNum=0;
        $model->eId=$message["eid"];
        $model->tagsId="0";
        $model->insert();
        $tags=$request->post("tags");
        if($tags!=null&&$tags!="")
        {
            $model->tagsId="";
            $tags= explode(',',$tags);
            foreach ($tags as $tag)
            {
                $model->tagNum=$model->tagNum+1;
                $model2=new Tag();
                $tagTemp=$model2->find()->where(["tagName"=>$tag])->One();
                if(empty($tagTemp))
                {
                    $model2->tagName=$tag;
                    $model2->bids=$model->id."";
                    $model2->bookNum=1;
                    $model2->insert();
                    if($model->tagsId==null||$model->tagsId==""){ $model->tagsId=$model2->id;}
                    else{$model->tagsId=$model->tagsId.",".$model2->id;}
                }
                else{
                    $tagTemp=$model2::findOne($tagTemp["id"]);
                    $tagTemp->bids=$tagTemp->bids.",".$model->id;
                    $tagTemp->bookNum=$tagTemp->bookNum+1;
                    $tagTemp->save();
                    if($model->tagsId==null||$model->tagsId==""){ $model->tagsId=$tagTemp->id;}
                    else{$model->tagsId=$model->tagsId.",".$tagTemp->id;}
                }
            }
        }
        $model->save();
        return ["errorCode"=>"200","message"=>"添加成功"];
    }


   //删除书籍
    public function actionDelete(){
        $message=JWT::decode($_SERVER['HTTP_AUTHORIZATION']);   if(!$message){ return ["errorCode"=>"500","message"=>"身份验证失败"];}
        Yii::$app->response->format = Response::FORMAT_JSON;
        $request = Yii::$app->request;
        $model= new Book();
        $model->id=$request->post("id");
        $book=$model->find()->where(["id"=>$model->id,"eId"=>$message["eid"]])->One();
        if($book==null||$book==""){
            return ["errorCode"=>"500","message"=>"非法操作"];
        }
        $book["state"]=true;
        $book->update();
        return ["errorCode"=>"200","message"=>"删除成功"];
    }


    //查询信息
    public function actionSelect()
    {
        $message=JWT::decode($_SERVER['HTTP_AUTHORIZATION']);   if(!$message){ return ["errorCode"=>"500","message"=>"身份验证失败"];}
        Yii::$app->response->format = Response::FORMAT_JSON;
        $request = Yii::$app->request;
        $bookName=$request->get("name");
        $bookTag=$request->get("tags");
        if(($bookName==null||$bookName=="")&&($bookTag==null||$bookTag==""))
        {
            $totleCount=Book::find()->where(["eId"=>$message["eid"]])->count();
            $pagination = new Pagination([
                'defaultPageSize' => 3,
                'totalCount' =>$totleCount,
            ]);
            $list=Book::find()->where(["eId"=>$message["eid"]])->offset($pagination->offset)
                ->limit($pagination->limit)
                ->all();
            return ["errorCode"=>"200",'message' => "查询成功",'totleCount'=>$totleCount,"list"=>$list];
        }


    }

    }

