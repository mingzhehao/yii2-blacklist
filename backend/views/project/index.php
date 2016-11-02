<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ProjectSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '项目管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-index">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('项目创建', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            'appid',
            'appkey',
            [
                'attribute' => 'status',
                'value'     => function($data){
                    if($data->status == 1)
                        return "活跃";
                    else
                        return "封禁";
                },
                'filter'    => [
                        1  => '活跃',//key 0  为传递到后台搜索值，值为对外显示值
                        0   => '封禁',
                   ],  
            ],
            // 'desc',
            // 'belong_uid',
            [   
                'attribute' => 'created_at', 
                'format' => 'text',
                'value' => function($data){return date("Y-m-d H:i:s",($data->created_at));},
            ],  

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
