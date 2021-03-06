<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\jui\DatePicker;
use app\models\Category;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Note */

$this->title = 'Update Note: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Notes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->noteId]];
$this->params['breadcrumbs'][] = 'Update';
?>

<div class="form-block-main">

    <div class='form-block'>
        
    <h1><?= Html::encode($this->title) ?></h1>
    <br>
    <?php $form = ActiveForm::begin([
            'id' => 'normal-form',
            'options' =>[
                'class' => 'myform'
            ],
            'layout' => 'horizontal',
            'fieldConfig' => [
                'template' => "{label}\n<div class=\"col-lg-12\">{input}</div>\n<div class=\"col-lg-3\">{error}</div>",
                'labelOptions' => ['class' => 'col-lg-6 control-label'],
            ],
        ]); ?>

            <?= $form->field($model, 'title')->textInput(['autofocus' => true]) ?>
            
            <?= $form->field($model, 'description')->textarea(['rows' => '6']) ?>

            <?= $form->field($model, 'categoryId')->dropDownList(
                                                ArrayHelper::map(Category::find()->asArray()->all(), 'categoryId', 'categoryName'),
                                                ['prompt'=>'Please select a category']    
                            ); ?>

            <?= $form->field($model, 'reminderDate')->widget(DatePicker::className(),
                                                                [
                                                                    'dateFormat' => 'yyyy-MM-dd', 
                                                                    'options' => ['class' => 'form-control']
                                                                ],
                                                                ) ?>
            
            <?= $form->field($model, 'reminderTime')->textInput(['disabled'=>true])
                                                    ->widget(\janisto\timepicker\TimePicker::className(), [
                                                            //'language' => 'fi',
                                                            'mode' => 'time',
                                                            'clientOptions'=>[
                                                                'timeFormat' => 'HH:mm:ss',
                                                                'showSecond' => true,
                                                            ]
                                                    ])?>

            <?= $form->field($model, 'expiryDateTime')->textInput()
                                                      ->widget(\janisto\timepicker\TimePicker::className(), [
                                                            //'language' => 'fi',
                                                            'mode' => 'datetime',
                                                            'clientOptions'=>[
                                                                'dateFormat' => 'yy-mm-dd',
                                                                'timeFormat' => 'HH:mm:ss',
                                                                'showSecond' => true,
                                                            ]
                                                        ])
            ?>
            
        

            <div class="form-group">
                <div class="col">
                    <?= Html::submitButton('Update', ['class' => 'btn btn-primary btn-lg btn-block ', 'name' => 'register-button']) ?>
                </div>
            </div>

        <?php ActiveForm::end(); ?>
        </div>
</div>

