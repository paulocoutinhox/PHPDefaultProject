<?php

class DefaultController extends AdminController
{
    
	public function actionIndex()
	{
		$this->render('index', array(
			
		));
	}
    
    public function actionError()
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
	        	$this->render('error', $error);
			}
	    }
	}
}