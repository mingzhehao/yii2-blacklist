<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "project".
 *
 * @property integer $id
 * @property string $name
 * @property integer $appid
 * @property string $appkey
 * @property integer $status
 * @property string $desc
 * @property integer $belong_uid
 * @property integer $created_at
 * @property integer $updated_at
 */
class Project extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'project';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'appid', 'appkey', 'desc', 'belong_uid', 'created_at', 'updated_at'], 'required'],
            [['appid', 'status', 'belong_uid', 'created_at', 'updated_at'], 'integer'],
            [['name', 'appkey'], 'string', 'max' => 64],
            [['desc'], 'string', 'max' => 255],
            [['appid'], 'unique'],
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
            'appid' => 'Appid',
            'appkey' => 'Appkey',
            'status' => 'Status',
            'desc' => 'Desc',
            'belong_uid' => 'Belong Uid',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
