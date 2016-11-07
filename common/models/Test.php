<?php
/***************************************************************************
 * Test Model
 * Copyright (c) 2016 github.com, Inc. All Rights Reserved
 * 
 **************************************************************************/
 
 
 
/**
 * @file common/models/Test.php
 * @author root(mingzhehao@github.com)
 * @date 2016/11/07 10:48:10
 *  
 **/


namespace common\models;

use Yii;

/**
 *
 * @property string $action
 * @property integer $app_id
 */
class Test extends \yii\db\ActiveRecord
{
    var $appid; //app主键id
    var $params;//远程接口所需要的参数，支持用户自己拼接
}





?>
