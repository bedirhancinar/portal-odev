<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel vendor\kouosl\odev\models\OdevcategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Odevcategories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="odevcategory-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Odevcategory', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'categorytitle',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
