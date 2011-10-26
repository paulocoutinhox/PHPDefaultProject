<?php

class SiteController extends CController
{
	
	protected $currentUser;
	
	public function init() 
	{
		parent::init();
	}
	
    public function filters()
    {
        return array(
			'getCurrentUser',
        );
    }

	public function actions()
	{
		return array(
			'captcha'=>array(
				'class'=>'CCaptchaAction',
			),
		);
	}
	
	public function filterGetCurrentUser($filterChain)
	{
		if (UserUtil::getDefaultWebUser()->getIsGuest())
		{
			$this->currentUser = UserUtil::getDefaultWebUser()->getModel();
		}
		else
		{
			$this->currentUser = null;
		}
		
		$filterChain->run();
	}
	
}