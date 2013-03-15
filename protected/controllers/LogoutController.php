<?php

class LogoutController extends SiteController
{
	
    public function actionIndex()
    {
        UserUtil::getDefaultWebUser()->logout();
        $this->redirect(array('/home/index'));
    }
    
}
