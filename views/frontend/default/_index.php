<?php
use kouosl\theme\helpers\Html;
use kouosl\theme\widgets\Portlet;
use kouosl\theme\widgets\ButtonYonlendir;

$this->title = 'Index Sample';
$data['title'] = Html::encode($this->title);
$this->params['breadcrumbs'][] = $this->title;



 ButtonYonlendir::widget(['message' => 'Good morning']); 

Portlet::begin(['title' => $this->title,'subTitle' => 'samples data','icon' => 'glyphicon glyphicon-cog']);

echo $this->render('index');

Portlet::end();



