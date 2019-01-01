<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model vendor\kouosl\odev\models\Odev */

$this->title = 'Create Odev';
$this->params['breadcrumbs'][] = ['label' => 'Odevs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="odev-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
