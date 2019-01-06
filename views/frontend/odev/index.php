<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kouosl\odev\Module;
use kouosl\odev\models\Odev;
use yii\data\ActiveDataProvider;



/* @var $this yii\web\View */
/* @var $searchModel vendor\kouosl\odev\models\OdevSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Odevs';
$this->params['breadcrumbs'][] = Module::t('odev',$this->title);
?>
<div class="odev-index">

    <h1><?= Html::encode(Module::t('odev',$this->title)) ?></h1>
    


<?php
    $time=date('Y-m-d h:m:s');
       $query = Odev::find()->where("startdate <= '$time' AND enddate >= '$time'")->andWhere(['status' => 'active'] );
      $dataProvider = new ActiveDataProvider([
            
            'query' => $query,
        ]);

        echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\ActionColumnView'],
            ['class' => 'yii\grid\SerialColumn'],

            'title',
            'content:ntext',
            [
                'attribute' => 'userid',
                'value' => 'user.username',
            ],
            [
                'attribute' => 'categoryid',
                'value' => 'category.categorytitle',
            ],
            

        ],
    ]); 
?>
</div>
