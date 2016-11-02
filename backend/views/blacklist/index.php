<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Project;

/* @var $this yii\web\View */
/* @var $searchModel common\models\BlacklistSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '黑名单管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blacklist-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('黑名单添加', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'appid',
                'value'     => function($data){
                    $projectList = Project::getProjectList();
                    return $projectList[$data->appid];
                },
                'filter'    => $projectList = Project::getProjectList(),
            ],
            'content',
            [   
                'attribute' => 'created_at', 
                'format' => 'text',
                'value' => function($data){return date("Y-m-d H:i:s",($data->created_at));},
            ],  

            ['class' => 'yii\grid\ActionColumn', 'header' => '操作']
        ],
    ]); ?>
</div>
