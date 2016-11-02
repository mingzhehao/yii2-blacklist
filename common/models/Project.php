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
class Project extends \common\models\CustomActiveRecord
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
            [['name','desc'], 'required'],
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
            'name' => '项目名称',
            'appid' => '应用ID',
            'appkey' => '应用KEY',
            'status' => '应用状态',
            'desc' => '应用描述',
            'belong_uid' => '所属用户',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }

    public function beforeSave($insert)
    {
        if($this->isNewRecord)
        {   
            $this->appid  = $this->getAppId();
            $this->appkey = $this->getAppSecret();
        }   
        else
        {   
            $this->updated_at=time();
        } 
        return parent::beforeSave($insert);
    }

    /**
     * 获取应用appId
     * @param  [type] $appType [description]
     * @return [type]          [description]
     */
    private function getAppId($appType = "web")
    {
        $time = time();
        $rand = rand(1,1000);
        $crc = crc32($time.$appType.$rand);
        return sprintf("%u", $crc);
    }

    /**
     * 获取应用appSecret
     * @param  [type] $appType [description]
     * @return [type]          [description]
     */
    private function getAppSecret($appType = "webKey")
    {
        $time = time();
        $rand = rand(1,1000);
        $md5 = md5($time.$appType.$rand);
        return $md5;
    }
    
    /**
     * 获取应用状态
     */
    public static function getStatusList()
    {
        return array(
            1 => "可用",
            0 => "不可用",
        );
    }

    //获取应用列表
    public static function getProjectList()
    {
        if( Yii::$app->user->can('administrator') ){
            $models = self::find()->all();
        }
        else {
            $models = self::find(['id' => $uid ])->all();
        }
        $provider = [];
        foreach($models as $item) {
            $provider[$item->appid] = $item->name;
        }
        return $provider;
    }

}
