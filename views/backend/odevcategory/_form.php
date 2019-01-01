<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model vendor\kouosl\odev\models\Odevcategory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="odevcategory-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'categorytitle')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
