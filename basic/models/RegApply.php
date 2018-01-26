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
            [['uid', 'createTime'], 'integer'],
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
            'state' => 'State',
            'createTime' => 'Create Time',
        ];
    }
}
