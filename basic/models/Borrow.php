<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%bkm_borrow}}".
 *
 * @property integer $id
 * @property integer $uid
 * @property integer $bid
 * @property integer $createTime
 */
class Borrow extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%bkm_borrow}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uid', 'bid', 'createTime'], 'integer'],
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
            'createTime' => 'Create Time',
        ];
    }
}
