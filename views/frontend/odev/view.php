<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model vendor\kouosl\odev\models\Odev */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Odevs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="odev-view">

    <h1><?= Html::encode($this->title) ?></h1>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'title',
            'content:ntext',
            'categoryid',
            'startdate',
            'enddate',
        ],
    ]) ?>

</div>
