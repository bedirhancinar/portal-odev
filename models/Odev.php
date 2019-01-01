<?php

namespace kouosl\odev\models;

use Yii;

/**
 * This is the model class for table "odev".
 *
 * @property int $id
 * @property string $title
 * @property string $content
 * @property int $userid
 * @property int $categoryid
 * @property string $status
 * @property string $startdate
 * @property string $enddate
 * @property string $modified
 */
class Odev extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'odev';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'content', 'categoryid', 'startdate', 'enddate'], 'required'],
            [['content', 'status'], 'string'],
            [['userid', 'categoryid'], 'integer'],
            [['startdate', 'enddate', 'modified'], 'safe'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'content' => 'Content',
            'userid' => 'Userid',
            'categoryid' => 'Categoryid',
            'status' => 'Status',
            'startdate' => 'Startdate',
            'enddate' => 'Enddate',
            'modified' => 'Modified',
        ];
    }
}
