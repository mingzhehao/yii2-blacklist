<?php
/***************************************************************************
 * 测试管理form页面
 * Copyright (c) 2016 github.com, Inc. All Rights Reserved
 * 
 **************************************************************************/
 
 
 
/**
 * @file backend/views/test/_form.php
 * @author root(mingzhehao@github.com)
 * @date 2016/11/07 10:30:08
 *  
 **/
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use common\models\Project;

/* @var $this yii\web\View */
/* @var $model common\models\ServiceManage */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="service-manage-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'appid')->label("应用")->dropDownList(Project::getProjectList()); ?>

    <?= $form->field($model, 'params')->label("自定义拼接参数")->hint("格式为url方式: uid=1766&uname=音画魔方"); ?>

    <div class="form-group">
        <?= Html::submitButton('创建' , ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php if(!empty($urls)){ ?>
<div class="box-body">
    <div class="test-manage-index">
        <h2>接口url如下：</h2>
            <div class="service-manage-form">
                <textarea class="form-control" rows="20">
                    <?= $urls ?>
                </textarea>
            </div>
    </div>
</div>

<?php } ?>





