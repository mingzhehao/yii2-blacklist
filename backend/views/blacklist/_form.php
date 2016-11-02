<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Project;

/* @var $this yii\web\View */
/* @var $model common\models\Blacklist */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="blacklist-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'appid')->dropDownList(Project::getProjectList())?>

    <?= $form->field($model, 'content')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '创建' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
