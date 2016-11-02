<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "blacklist".
 *
 * @property integer $id
 * @property integer $appid
 * @property string $content
 * @property integer $created_at
 * @property integer $updated_at
 */
class Blacklist extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'blacklist';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['appid', 'content', 'created_at', 'updated_at'], 'required'],
            [['appid', 'created_at', 'updated_at'], 'integer'],
            [['content'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'appid' => 'Appid',
            'content' => 'Content',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
