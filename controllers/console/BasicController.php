<?php

namespace kouosl\odev\controllers\console;
use yii\console\Controller;

class BasicController extends Controller{

    public function actionIndex(){
        $odev = \Yii::$app->db
          ->createCommand("SELECT COUNT(*) FROM odev")
          ->queryScalar();
        print_r($odev);
        echo"\n";
        //var_dump($user);
    }
    public function actionOdev(){
        \Yii::$app->db
        ->createCommand()
        ->insert('odev', [
          'title'      => 'odev6',
          'content'   => 'açıklama',
          'userid' => \Yii::$app->user->identity->id,
          'startdate' => time()-1,
          'enddate' => time()+1,
          'modified' => time(),

        ])
       ->execute();
    }
    public function actionOdevUpdate(){
        \Yii::$app->db
        ->createCommand()
        ->update('odev', [
        'modified' => time()
        ], '1 = 1')
        ->execute();
    }
    public function actionOdevDelete(){
       
            \Yii::$app->db
             ->createCommand()
            ->delete('odev', 'id = 1')
            ->execute();
        
       
    }
    

}