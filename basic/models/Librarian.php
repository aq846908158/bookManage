<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%bkm_librarian}}".
 *
 * @property integer $id
 * @property integer $eid
 * @property string $uids
 */
class Librarian extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%bkm_librarian}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uid', '$eid'], 'integer'],
            [['uids'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            '$eid' => '企业ID',
            '$uids' => '管理员们   用,分隔',
        ];
    }
}
