<?php

class AdminController extends CController
{
	
	public $layout = 'main';
    
    protected $moduleTitle = 'Administrativo';

	public function init() 
	{
		parent::init();
		
		Yii::app()->clientScript->registerCoreScript('jquery');
		Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/scripts/admin/jquery/jquery.form.js');
        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/scripts/admin/jquery/jquery.maskmoney.js');
		Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/scripts/admin/dropDownMenu.js');
		Yii::app()->clientScript->registerCoreScript('maskedinput');
	}
        
    public function filters()
    {
        return array(
            'accessControl',
        );
    }

    public function filterAccessControl($filterChain)
    {
		
		if ($this->getId() != 'login')
		{			

			if (UserUtil::getAdminWebUser()->getIsGuest())
			{
				if(Yii::app()->request->isAjaxRequest)
				{
					$this->renderPartial('/shared/_blank');
					Yii::app()->end();
				}
				else
				{
					$this->redirect(array('/admin/login'));
				}
			} 
			else if (!User::hasPermission($this->getId(), $this->getAction()->getId()))
			{
				UserUtil::getAdminWebUser()->setFlash(Constants::ERROR_MESSAGE_ID, 'Você não possui permissão para acessar este módulo. Consulte o administrador do sistema. ('.$this->getId().' / ' . $this->getAction()->getId() . ')');

				if(Yii::app()->request->isAjaxRequest)
				{	    		
					$this->renderPartial('/shared/_blank');
					Yii::app()->end();
				}
				else
				{
					$this->redirect(array('/admin/login'));
				}
			}
			
		}
		
        $filterChain->run();
    }
	
}