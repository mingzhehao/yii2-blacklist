<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Blacklist */

$this->title = '黑名单添加';
$this->params['breadcrumbs'][] = ['label' => '黑名单管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blacklist-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
