<?php

namespace kouosl\odev\models;

use Yii;

/**
 * This is the model class for table "odevcategory".
 *
 * @property int $id
 * @property string $categorytitle
 */
class Odevcategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'odevcategory';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['categorytitle'], 'required'],
            [['categorytitle'], 'string', 'max' => 128],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'categorytitle' => 'Categorytitle',
        ];
    }
}
