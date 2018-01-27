<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%bkm_reg_apply}}".
 *
 * @property integer $id
 * @property integer $uid
 * @property boolean $state
 * @property integer $createTime
 * @property integer $eId
 * @property boolean $passState
 */
class RegApply extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%bkm_reg_apply}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uid', 'createTime','eId'], 'integer'],
            [['state'], 'boolean'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'uid' => 'Uid',
            'state' => '审核状态',
            'createTime' => 'Create Time',
            'eId' => '企业ID',
            'passState' => '通过状态  true为通过',
        ];
    }
}
