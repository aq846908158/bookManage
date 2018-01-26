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
            [['activation'], 'integer'],
            [['name'], 'string', 'max' => 255],
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
        ];
    }
}
