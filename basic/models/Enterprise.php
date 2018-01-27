<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%bkm_enterprise}}".
 *
 * @property integer $id
 * @property string $name
 * @property boolean $activationState
 * @property integer $activation
 * @property integer $createTime
 */
class Enterprise extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%bkm_enterprise}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [

            [['activationState'], 'boolean'],
            [['createTime'], 'integer'],
            [['activation'],'required','message'=>'激活码必须填写'],
            [['name'], 'string', 'max' => 32,"message"=>"企业名称过长"],
            [['name'],'required','message'=>'企业名称必须填写'],
            [['name'], 'unique','message'=>'企业名称已经被使用'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'activationState' => 'Activation State',
            'activation' => 'Activation',
            'createTime' => '创建时间',
        ];
    }
}
