<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%bkm_user}}".
 *
 * @property integer $id
 * @property string $user_Name
 * @property string $userPwd
 * @property string $wxId
 * @property string $name
 * @property string $employeeId
 * @property integer $createTime
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%bkm_user}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['createTime'], 'integer'],
            [['user_Name'],'required','message'=>'用户名必须填写'],
            [['user_Name'],'match','pattern'=>'/^[a-zA-Z0-9_-]{8,32}$/','message'=>'用户名长度必须在8-32位字符以内'],
            [[ 'wxId', 'employeeId'], 'string', 'max' => 255,"message"=>"长了"],
            [['userPwd'],'required','message'=>'密码必须填写'],
            [['userPwd'],'match','pattern'=>'/^[0-9a-zA-Z!@#$^]{8,32}$/','message'=>'密码长度必须在8-32位字符以内'],
            [['name'],'required','message'=>'真实姓名必须填写'],
            [['name'],'string', 'length' => [2, 6]],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_Name' => '用户名',
            'userPwd' => '用户密码',
            'wxId' => '微信ID',
            'name' => '真实姓名',
            'employeeId' => '企业ID',
            'createTime' => '创建时间',
        ];
    }
}
