<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\BlogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Blogs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blog-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Blog', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            [
                'attribute' => 'title',
                'value' => function($model){
                    return mb_substr($model->title,0,10).'...';
                }
            ],
            //'title',
            //'content:ntext',
            //'column_id',
            [
                'label' => '分类',
                'attribute' => 'column_name',
                'value' => 'column.name'
            ],
            [
                'attribute' => 'review',
                'value' => function($model){
                    return $model->review==1?'已审核':'未审核';
                }
            ],
            [
                'attribute' => 'created_at',
                'format' => ['date','php:Y-m-d H:i:s'],
            ],

            [
                'header' => '管理',
                'class' => 'yii\grid\ActionColumn'
            ],
        ],
    ]); ?>
</div>
