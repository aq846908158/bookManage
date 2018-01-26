<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%bkm_need}}".
 *
 * @property integer $id
 * @property integer $uid
 * @property string $name
 * @property integer $createTime
 * @property boolean $state
 * @property string $echoContent
 * @property integer $echo_uid
 */
class Need extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%bkm_need}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uid', 'createTime', 'echo_uid'], 'integer'],
            [['state'], 'boolean'],
            [['echoContent'], 'string'],
            [['name'], 'string', 'max' => 30],
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
            'name' => 'Name',
            'createTime' => 'Create Time',
            'state' => 'State',
            'echoContent' => 'Echo Content',
            'echo_uid' => 'Echo Uid',
        ];
    }
}
