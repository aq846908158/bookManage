<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%bkm_tag}}".
 *
 * @property integer $id
 * @property string $tagName
 * @property string $bids
 * @property integer $bookNum
 */
class Tag extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%bkm_tag}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bids'], 'string'],
            [['bookNum'], 'integer'],
            [['tagName'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tagName' => 'Tag Name',
            'bids' => 'Bids',
            'bookNum' => 'Book Num',
        ];
    }
}
