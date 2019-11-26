<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Note */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Notes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="note-view">

    <h1><?= Html::encode($this->title) ?> 
    <?= Html::label($categoryName ,null, ['class'=> 'badge badge-info', 'style'=> 'font-size:13px;' ] ); ?>
    </h1>  

    
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->noteId], ['class' => 'btn btn-primary']) ?>

        <?= Html::a('Delete', ['delete', 'id' => $model->noteId], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'title',
            'description:ntext',
            'addedDateTime',
            'reminderDate',
            'reminderTime',
            'expiryDateTime',
        ],
    ]) ?>

</div>
