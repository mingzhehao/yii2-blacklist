<?php
/***************************************************************************
 * 测试管理页面
 * Copyright (c) 2016 github.com, Inc. All Rights Reserved
 * 
 **************************************************************************/
 
 
 
/**
 * @file backend/views/test/index.php
 * @author root(mingzhehao@github.com)
 * @date 2016/11/07 10:29:18
 *  
 **/


use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ServiceManage */

$this->title = '测试接口';
$this->params['breadcrumbs'][] = ['label' => '测试管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="test-manage-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'urls'  => $urls,
    ]) ?>

</div>





