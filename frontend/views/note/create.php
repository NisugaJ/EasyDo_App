<?php
// namespace \kartik\widgets;

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\jui\DatePicker;
// use kartik\datetime\DateTimePicker;


/* @var $this yii\web\View */
/* @var $model app\models\Note */

$this->title = 'Create Note';
$this->params['breadcrumbs'][] = ['label' => 'Notes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="note-create ">

    <h1><?= Html::encode($this->title) ?></h1>
<?php
        foreach ($categories as $key => $category) {
            print_r($category->categoryName);
            print_r($category->categoryId);
         }
?>
    <br>
    <?php $form = ActiveForm::begin([
            'id' => 'normal-form',
            'layout' => 'horizontal',
            'fieldConfig' => [
                'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-2\">{error}</div>",
                'labelOptions' => ['class' => 'col-lg-1 control-label'],
            ],
        ]); ?>

            <?= $form->field($model, 'title')->textInput(['autofocus' => true]) ?>
            
            <?= $form->field($model, 'description')->textInput(['autofocus' => true]) ?>

            <?= $form->field($model, 'category')->textInput(['autofocus' => true])  ?>

            <?= $form->field($model, 'reminderDate' )->textInput(['autofocus' => true, 'class' => 'form-control'])->widget(DatePicker::className(),['clientOptions' => ['defaultDate' => date("Y-m-d")]]) ?>
            <span class="fas fa-calendar-alt"></span>
            
            <?= $form->field($model, 'reminderTime')->textInput()?>
            <?= $form->field($model, 'expiryDateTime')->textInput()?>

            
            <div class="form-group">
                <div class="col-lg-offset-1 col-lg-11">
                    <?= Html::submitButton('Create', ['class' => 'btn btn-primary btn-lg btn-block', 'name' => 'register-button']) ?>
                </div>
            </div>

        <?php ActiveForm::end(); ?>
</div>
