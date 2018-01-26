<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%bkm_book}}".
 *
 * @property integer $id
 * @property string $name
 * @property integer $pageNumber
 * @property string $image
 * @property string $summary
 * @property boolean $state
 * @property integer $tagNum
 * @property integer $createTime
 */
class Book extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%bkm_book}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pageNumber', 'tagNum', 'createTime'], 'integer'],
            [['summary'], 'string'],
            [['state'], 'boolean'],
            [['name', 'image'], 'string', 'max' => 255],
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
            'pageNumber' => 'Page Number',
            'image' => 'Image',
            'summary' => 'Summary',
            'state' => 'State',
            'tagNum' => 'Tag Num',
            'createTime' => 'Create Time',
        ];
    }



}
