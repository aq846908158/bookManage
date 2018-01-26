<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%bkm_activation}}".
 *
 * @property integer $id
 * @property string $activation
 * @property boolean $state
 * @property integer $useTime
 * @property integer $createTime
 */
class Activation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%bkm_activation}}';
    }




    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['state'], 'boolean'],
            [['useTime', 'createTime'], 'integer'],
            [['activation'], 'string', 'max' => 32],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'activation' => 'Activation',
            'state' => 'State',
            'useTime' => 'Use Time',
            'createTime' => 'Create Time',
        ];
    }
}
