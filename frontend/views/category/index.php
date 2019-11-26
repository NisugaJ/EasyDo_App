<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('Create Category', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div style="overflow-x: auto;">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'categoryId',
            'categoryName',

            [
                'class'    => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete}',
                'buttons'  => [
                    'view'   => function ($url, $model) {
                        $url = Url::to(['category/view', 'id' => $model['categoryId']]);
                        return Html::a('<span class="fa fa-eye"></span>', $url, ['title' => 'view']);
                    },
                    'update' => function ($url, $model) {
                        $url = Url::to(['category/update', 'id' => $model['categoryId']]);
                        return Html::a('<span class="fas fa-pencil-alt"></span>', $url, ['title' => 'update']);
                    },
                    'delete' => function ($url, $model) {
                        $url = Url::to(['category/delete', 'id' => $model['categoryId']]);
                        return Html::a('<span class="fa fa-trash"></span>', $url, [
                            'title'        => 'delete',
                            'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this category ?'),
                            'data-method'  => 'post',
                        ]);
                    },
                ]       
            ]
        ],
    ]); ?>
    </div>
</div>
