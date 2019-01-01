<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel vendor\kouosl\odev\models\OdevSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Odevs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="odev-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Odev', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\ActionColumnView'],
            ['class' => 'yii\grid\SerialColumn'],


            'id',
            'title',
            'content:ntext',
            'userid',
            'categoryid',
            //'status',
            //'startdate',
            //'enddate',
            //'modified',

            ['class' => 'yii\grid\ActionColumnUpdateDelete'],
        ],
    ]); ?>
</div>
