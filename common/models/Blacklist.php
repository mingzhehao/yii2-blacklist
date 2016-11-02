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
class Blacklist extends \common\models\CustomActiveRecord
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
            [['appid', 'content'], 'required'],
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
            'appid' => '应用ID',
            'content' => '参数',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }
}
