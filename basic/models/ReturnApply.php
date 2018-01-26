<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%bkm_return_apply}}".
 *
 * @property integer $id
 * @property integer $uid
 * @property integer $bid
 * @property boolean $state
 * @property integer $createTime
 */
class ReturnApply extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%bkm_return_apply}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uid', 'bid', 'createTime'], 'integer'],
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
            'bid' => 'Bid',
            'state' => 'State',
            'createTime' => 'Create Time',
        ];
    }
}
