<?php

namespace kouosl\odev\controllers\api;

use kouosl\odev\models\Odev;
use kouosl\site\models\SignupForm;
use Yii;

class OdevController extends DefaultController {
	
	public $modelClass = 'kouosl\odev\models\Odev';

	public function actions() {
		$actions = parent::actions ();
	
		return $actions;
	}
	
	public function actionView($id){

		$model = Odev::findOne($id);
		
		if(!$model)
			return ['status' => '404','message' => 'Not Found'];

		return $model;
	}
	
	public function actionIndex(){
		return Odev::find()->all();
	}
	
	public function actionCreate(){

        $postParams = json_decode(Yii::$app->request->getRawBody(), true);        
        $model = new SignupForm();

        if ($model->load($postParams,'') && $model->validate()) {
            if ($odev = $model->signup()) {            
                return $odev;
            }
        }else{
            return ['status' => 500];
        }
	}
	
	public function actionUpdate($id){

		$postParams = json_decode(Yii::$app->request->getRawBody(), true);
		
		$model = Odev::findOne($id);

		if($model = $this->LoadModel($model, $postParams)){
				if($model->save())
					return $model;
				else 
					return ['status' => 101,'message' => $model->errors];
		}else
		    return ['status' => 100];
	}
	
	public function actionDelete($id){
		
		if(Odev::findOne($id)->delete())
			return ['status' => 1];
		else
			return ['stauts' => 100];
	}
	
	public function LoadModel($model,$params)
	{
		foreach ($params as $key => $value)
			$model->hasAttribute($key) ? $model->$key = $value : " "; 
			
		return $model;
	}
}