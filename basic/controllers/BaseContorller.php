<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/23 0023
 * Time: 10:03
 */

namespace app\controllers;
use yii\filters\Cors;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
class BaseContorller extends Controller
{

    public $enableCsrfValidation = false;//关闭csrf拦截
    public function behaviors()
    {
        return ArrayHelper::merge(
            [['class' => Cors::className(),],], parent::behaviors());//开启跨域
    }



}