<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model vendor\kouosl\odev\models\Odevcategory */

$this->title = 'Create Odevcategory';
$this->params['breadcrumbs'][] = ['label' => 'Odevcategories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="odevcategory-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
