<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kouosl\odev\models\Odevcategory;
use kartik\datetime\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model vendor\kouosl\odev\models\Odev */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="odev-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'categoryid')->dropDownList(ArrayHelper::map(Odevcategory::find()->all(), 'id' , 'categorytitle' ), ['prompt'=>'Kategori Seçin']) ?>

    <?= $form->field($model, 'status')->dropDownList([ 'active' => 'Active', 'passive' => 'Passive', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'startdate')->widget(DateTimePicker::classname(), [
    'options' => ['placeholder' => 'Enter event time ...'],
    'pluginOptions' => [
        'autoclose' => true
    ]
    ]);?>

    <?= $form->field($model, 'enddate')->widget(DateTimePicker::classname(), [
    'options' => ['placeholder' => 'Enter event time ...'],
    'pluginOptions' => [
        'autoclose' => true
    ]
    ]);?>

    

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
