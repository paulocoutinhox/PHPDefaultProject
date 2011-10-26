<?php

class ErrorController extends SiteController
{

	public function actionIndex()
	{
	    $error = Yii::app()->errorHandler->error;

		if($error)
	    {
	    	if(Yii::app()->request->isAjaxRequest)
			{
	    		echo $error['message'];
			}
	    	else
			{
	        	$this->render('index', $error);
			}
	    }
	}
	
}