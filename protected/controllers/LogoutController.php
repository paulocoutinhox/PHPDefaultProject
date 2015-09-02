<?php

class LogoutController extends SiteController
{
	
    public function actionIndex()
    {
        UserUtil::getDefaultWebUser()->logout(false);
        $this->redirect(array('/home/index'));
    }
    
}
