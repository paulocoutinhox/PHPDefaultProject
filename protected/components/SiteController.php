<?php

class SiteController extends CController
{

	protected $requiredAuth = false;

	public function actions()
	{
		return array(
			'captcha'=>array(
				'class'=>'CCaptchaAction',
			),
		);
	}

	public function filters()
	{
		return array(
			'checkIfRequireAuth',
		);
	}

	public function filterCheckIfRequireAuth($filterChain)
	{
		if (UserUtil::getDefaultWebUser()->getIsGuest())
		{
			if ($this->requiredAuth)
			{
				Yii::app()->user->setFlash(Constants::WARNING_MESSAGE_ID, 'O recurso que você tentou acessar requer um usuário autenticado, por favor, faça a autenticação com o seu usuário.');
				$this->redirect(array('/login/index'));
			}
		}

		$filterChain->run();
	}

}