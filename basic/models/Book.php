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
 * @property string $tagsId
 * @property integer $eId
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
            [['pageNumber', 'tagNum', 'createTime','eId'], 'integer'],
            [['summary','tagsId'], 'string'],
            [['tagsId'], 'required'],
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
            'id' => '主键，自增长',
            'name' => '书名',
            'pageNumber' => '页数',
            'image' => '图书封面缩略图地址',
            'summary' => '简介',
            'state' => '删除状态 1为删除',
            'tagNum' => '引用标签的数量',
            'createTime' => '创建时间',
            'tagsId' => '所用标签ID',
            'eId' => '企业ID',
        ];
    }



}
